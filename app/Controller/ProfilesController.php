<?php

class ProfilesController extends AppController {

    public $helpers = array('Html', 'Form');

    public function edit() {
        if($this->request->is('post')) {
            if($this->Profile->save($this->request->data)) {
                $this->Session->setFlash('Your profile has been updated.');
                $this->redirect(array('action' => 'edit'));
            }
            
            $this->Session->setFlash('There was a problem saving your profile. Please try again.');
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $this->Profile->find('first', array(
                'conditions' => array('User.id' => $this->Auth->user('id'))
            ));
        }
    }

}