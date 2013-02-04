<?php

class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public function register() {
        if($this->request->is('post')) {
            $this->User->create();
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('You have been registered.');
                $this->redirect(array('action' => 'register'));
            } else {
                $this->Session->setFlash('There was an error registering your account. Please try again.');
            }
        }
    }

    public function login() {
        if($this->request->is('post')) {
            if($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Invalid username or password, try again.');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}