<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $paginate = array(
        'limit' => 6,
        'order' => array(
            'Post.created' => 'desc'
        ),
        'recursive' => 2,
        'paramType' => 'querystring'
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    public function admin_index() {
        $this->set('pageTitle', 'News - Admin Panel');
        $this->set('currentPage', 'news');

        $this->set('posts', $this->Post->find('all', array(
            'order' => 'Post.created desc'
        )));

        $this->layout = 'admin';
    }

    public function index() {
        $this->set('pageTitle', 'News - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'news');

        $this->set('posts', $this->paginate('Post'));
    }

    public function view($id = null) {
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.id' => $id),
            'recursive' => 2
        ));
        if(!$post) {
            throw new NotFoundException('Invalid post');
        }

        $this->set('pageTitle', $post['Post']['title'] . ' - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'news');
        $this->set('post', $post);
    }

    public function admin_view($id = null) {
        $this->set('pageTitle', 'Post - Admin Panel');
        $this->set('currentPage', 'news');

        $post = $this->Post->findById($id);
        if(!$post) {
            throw new NotFoundException('Invalid post');
        }

        $this->set('post', $post);
        $this->layout = 'admin';
    }

    public function admin_add() {
        $this->set('pageTitle', 'Add Post - Admin Panel');
        $this->set('currentPage', 'news');

        if($this->request->is('post')) {
            // Add the user ID to the request data
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');

            $this->Post->create();
            if($this->Post->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }

        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $this->set('pageTitle', 'Edit Post - Admin Panel');
        $this->set('currentPage', 'news');

        $post = $this->Post->findById($id);
        if(!$post) {
            throw new NotFoundException('Invalid post');
        }

        if($this->request->is('post') || $this->request->is('put')) {
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your post.');
            }
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $post;
        }

        $this->layout = 'admin';
    }

    public function admin_delete($id) {
        if($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if($this->Post->delete($id)) {
            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }

        $this->layout = 'admin';
    }
}