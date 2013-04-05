<?php

class ProfilesController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }


    public function view($id = null) {
        // Find profile using $id
        $profile = $this->Profile->find('first', array(
            'conditions' => array('Profile.id' => $id)
        ));

        if(!$profile) {
            // Profile doesn't exist, return 404
            // TODO: route to 404 page
            // redirectUrl(array('controller' => 'pages', 'action' => '404'));
            throw new NotFoundException();
        }

        $this->set('profile', $profile);
    }

    public function edit() {
        if($this->request->is('post') || $this->request->is('put')) {
            if($this->Profile->save($this->request->data)) {
                $this->Session->setFlash('Your profile has been updated.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'edit'));
            }
            
            $this->Session->setFlash('There was a problem saving your profile. Please try again.', 'default', array('class' => 'error'));
        }

        $profile = $this->Profile->find('first', array(
            'conditions' => array('User.id' => $this->Auth->user('id'))
        ));

        $this->set('profile', $profile);

        // Get the skills corresponding to this profile
        $skills = '';
        foreach($profile['Skill'] as $skill) {
            $skills .= $skill['name'] . ', ';
        }
        $skills = rtrim($skills, ',');
        $this->set('skills', $skills);

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $profile;
        }
    }

    public function deleteProfilePicture() {
        $this->layout = 'ajax';

        // First find the profile ID from the user ID
        // Also get the users old profile picture to delete it from disk
        $profile = $this->Profile->find('first', array(
            'conditions' => array('User.id' => $this->Auth->user('id')),
            'fields'    => array('Profile.id', 'Profile.picture')
        ));

        // Don't do anything if a user has the default profile picture
        if($profile['Profile']['picture'] != 'user.png') {
            $this->Profile->id = $profile['Profile']['id'];
            $this->Profile->saveField('picture', 'user.png', array(
                'validate'  => false,
                'callbacks' => false
            ));

            // Delete old profile picture
            unlink(WWW_ROOT . 'img' . DS . 'profile_pics' . DS . $profile['Profile']['picture']);

            $this->set('response', array('status' => 'ok', 'url' => '/ISAD234/img' . DS . 'profile_pics' . DS . 'user.png'));
        } else {
            $this->set('response', array('status' => 'error', 'msg' => 'You cannot delete the default profile picture.'));
        }
    }

    // User online status
    public function onlineStatus($time) {
        $currentTime = time();

        if ($currentTime - $time <= 180) {
            return '<span class="status online"><span data-icon="&#xF0C7;"></span> Online</span>';
        } else {
            return '<span class="status offline"><span data-icon="&#xF0C7;"></span> Offline</span>';
        }
    }

    // User rank
    public function rank($rank) {
        switch ($rank) {
            case 1:
                return 'Admin';
                break;
        }
    }
}
