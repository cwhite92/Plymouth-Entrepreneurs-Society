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

        if(!$this->request->data) {
            // Auto populate form fields
            $profile = $this->Profile->find('first', array(
                'conditions' => array('User.id' => $this->Auth->user('id'))
            ));

            $this->request->data = $profile;

            // Get the skills corresponding to this profile
            $skills = array();
            foreach($profile['Skill'] as $skill) {
                $skills[] = $skill['name'];
            }

            $this->set('skills', $skills);
        }
    }

}