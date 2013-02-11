<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public function register() {
        if($this->request->is('post')) {
            $this->User->create();

            // Generate an activation hash
            $this->request->data['User']['activation'] = md5(microtime());

            if($this->User->save($this->request->data)) {
                // Also create and save the users profile
                $this->request->data['Profile']['user_id'] = $this->User->id;
                $this->request->data['Profile']['email'] = $this->request->data['User']['email'];

                if($this->User->Profile->save($this->request->data)) {
                    // Send activation email
                    $email = new CakeEmail('default');
                    $email->viewVars(array(
                        'emailTitle' => 'Activate your account',
                        'name' => $this->request->data['Profile']['firstname'],
                        'activation' => $this->request->data['User']['activation']
                    ))->to($this->request->data['User']['email'])->subject('Activate your account')->template('activation')->send();

                    $this->Session->setFlash('You have been registered. Please check your email for an activation code.');
                    $this->redirect(array('action' => 'register'));
                }
            }

            $this->Session->setFlash('There was a problem registering your account. Please try again.');
        }
    }

    public function activate($hash = null) {
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.activation' => $hash,
                'User.activated' => false
            )
        ));

        if(!$user) {
            throw new NotFoundException();
        }

        $user['User']['activated'] = true;
        $this->User->save($user);

        $this->Session->setFlash('Your account has been activated. You may now proceed to log in.');
        $this->redirect(array('controller' => 'pages', 'action' => 'home'));
    }

    public function login() {
        if($this->request->is('post')) {
            if($this->Auth->login()) {
                // We must check if the user has activated their account
                $user = $this->User->findByEmail($this->Auth->user('email'));
                if(!$user['User']['activated']) {
                    // They haven't activated, log them back out
                    $this->Auth->logout();
                    $this->Session->setFlash('You must activate your account before you can log in. Please check your email for details.');
                } else {
                    $this->redirect($this->Auth->redirect());
                }
            } else {
                $this->Session->setFlash('Invalid username or password, try again.');
            }

            // Remove any passwords from the password field
            unset($this->request->data['User']['password']);
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}