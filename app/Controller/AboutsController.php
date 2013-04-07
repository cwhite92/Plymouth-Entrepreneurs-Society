<?php

class AboutsController extends AppController {
    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

// Admin specific functions

    public function admin_index() {
        $this->set('about', $this->About->find('all'));
        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $about = $this->About->findById($id);
        if(!$about) {
            throw new NotFoundException('Invalid contact');
        }

        if($this->request->is('post') || $this->request->is('put')) {
            $this->About->id = $id;
            if($this->About->save($this->request->data)) {
//                $this->About->setFlash('Your about has been updated.'); TODO:this lines break it
                $this->redirect(array('action' => 'index'));
            } else {
                $this->About->setFlash('Unable to update your about.');
            }
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $about;
        }

        $this->layout = 'admin';
    }

// Non-Admin functions
    public function index() {
        $this->set('abouts', $this->About->find('all'));
    }
}