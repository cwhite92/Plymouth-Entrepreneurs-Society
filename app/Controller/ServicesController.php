<?php

class ServicesController extends AppController {
    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

// Admin specific functions

    public function admin_delete($id) {
        if($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if($this->Service->delete($id)) {
            $this->Session->setFlash('The service with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }

        $this->layout = 'admin';
    }

    public function admin_index() {
        $this->set('services', $this->Service->find('all'));
        $this->layout = 'admin';
    }


    public function admin_add() {
        if($this->request->is('post')) {
            $this->Service->create();
            if($this->Service->save($this->request->data)) {
                $this->Session->setFlash('Your service has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your service.');
            }
        }
        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $service = $this->Service->findById($id);
        if(!$service) {
            throw new NotFoundException('Invalid service');
        }

        if($this->request->is('post') || $this->request->is('put')) {
            $this->Service->id = $id;
            if($this->Service->save($this->request->data)) {
                $this->Session->setFlash('Your service has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your service.');
            }
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $service;
        }

        $this->layout = 'admin';
    }

// Non-Admin functions
    public function index() {
        $this->set('services', $this->Service->find('all'));
    }

    public function view($id = null) {
        $service = $this->Service->find('first', array(
            'conditions' => array('Service.id' => $id)
        ));
        if(!$service) {
            throw new NotFoundException('Invalid service');
        }

        $this->set('service', $service);
    }
}