<?php

class AboutsController extends AppController {
    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

// Admin specific functions
    public function admin_edit($id = null) {
        $this->set('pageTitle', 'About - Admin Panel');
        $this->set('currentPage', 'about');

        $about = $this->About->findById($id);
        if(!$about) {
            throw new NotFoundException('Invalid contact');
        }

        if($this->request->is('post') || $this->request->is('put')) {
            $this->About->id = $id;
            if($this->About->save($this->request->data)) {
                $this->Session->setFlash('The about page has been updated.');
                $this->redirect(array('action' => 'edit', 1));
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
        $this->set('pageTitle', 'About - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'about');

        $this->set('abouts', $this->About->find('all'));
    }
}