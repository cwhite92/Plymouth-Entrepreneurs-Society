<?php

class ContactsController extends AppController {
    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

// Admin specific functions
    public function admin_edit($id = null) {
        $this->set('pageTitle', 'Edit Contact - Admin Panel');
        $this->set('currentPage', 'contact');

        $contact = $this->Contact->findById($id);
        if(!$contact) {
            throw new NotFoundException('Invalid contact');
        }

        if($this->request->is('post') || $this->request->is('put')) {
            $this->Contact->id = $id;
            if($this->Contact->save($this->request->data)) {
                $this->Session->setFlash('Your contact details has been updated.');
                $this->redirect(array('action' => 'edit',1));
            } else {
                $this->Contact->setFlash('Unable to update your contact.');
            }
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $contact;
        }

        $this->layout = 'admin';
    }

// Non-Admin functions
    public function index() {
        $this->set('pageTitle', 'Contact - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'contact');

        $this->set('contacts', $this->Contact->find('all'));
    }
}