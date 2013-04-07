<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    public function admin_index() {
        $this->set('posts', $this->Post->find('all'));
        $this->layout = 'admin';
    }

    public function index() {
        $this->set('posts', $this->Post->find('all', array(
            'recursive' => 2
        )));
    }

    public function view($id = null) {
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.id' => $id),
            'recursive' => 2
        ));
        if(!$post) {
            throw new NotFoundException('Invalid post');
        }

        $this->set('post', $post);
    }

    public function admin_view($id = null) {
        $post = $this->Post->findById($id);
        if(!$post) {
            throw new NotFoundException('Invalid post');
        }

        $this->set('post', $post);
        $this->layout = 'admin';
    }

    public function admin_add() {
        if($this->request->is('post')) {
            // Add the user ID to the request data
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');

            // Fuck this, I can't be bothered trying to work out how to do it properly since we're running out of time.
            $this->request->data['Attachment'] = array();

            // Loop through all uploaded attachments
            foreach($this->request->data['Post']['attachments'] as $attachment) {
                // Only proceed if there wasn't an error uploading
                if($attachment['error'] == 0) {
                    // Attempt to move the uploaded file
                    if(move_uploaded_file($attachment['tmp_name'], WWW_ROOT . 'files' . DS . 'attachments' . DS . $attachment['name'])) {
                        // Format the array so it gets saved to the database correctly
                        $this->request->data['Attachment'][] = array(
                            'file_name' => $attachment['name']
                        );
                    }
                }
            }

            //die(debug($this->request->data));

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