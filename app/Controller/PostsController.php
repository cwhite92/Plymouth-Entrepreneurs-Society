<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jakechampion
 * Date: 05/04/2013
 * Time: 15:04
 * To change this template use File | Settings | File Templates.
 */
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->Auth->allow('view');
    }

    public function  admin_index() {
        $this->set('posts', $this->Post->find('all'));
        $this->layout = 'admin';
    }

    public function  index() {
        $this->set('posts', $this->Post->find('all', array(
            'recursive' => 2
        )));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function admin_view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
        $this->layout = 'admin';
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }
        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your post.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
        $this->layout = 'admin';
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
        $this->layout = 'admin';
    }
}