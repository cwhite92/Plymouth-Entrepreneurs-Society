<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public $paginateOptions = array(
        'limit' => 10,
        'order' => array(
            'User.created' => 'desc'
        )
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'activate', 'login');
    }

    public function admin_index($id = null) {
        $this->layout = 'admin';
    }

    public function admin_users() {
        $this->layout = 'admin';
        $this->set('users', $this->User->find('all'));
    }

    public function admin_edit() {
        if($this->request->is('post')) {
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('Account has been updated.');
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash('There was a problem saving the account settings. Please try again.');
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $this->User->find('first', array(
                'conditions' => array('User.id' => $this->Auth->user('id'))
            ));
        }
        $this->layout = 'admin';

    }

    // Has to be called memberList because of some type of reserved word
    public function memberList() {
        if(isset($this->request->data['User']['query'])) {
            // The user is searching, change the conditions of the retrieval
            $q = $this->request->data['User']['query'];
            $type = $this->request->data['User']['type'];

            switch($type) {
                case 'name':
                    $this->paginateOptions['conditions'] = array(
                        'OR' => array(
                            'Profile.firstname LIKE' => "%$q%",
                            'Profile.lastname LIKE' => "%$q%"
                        )
                    );
                    break;
                case 'skill':
                    $this->paginateOptions['conditions'] = array(
                        'OR' => array(
                            'Skill.name LIKE' => "%$q%"
                        ));
                    $this->paginateOptions['joins'] = array(
                        array(
                            'table' => 'profiles_skills',
                            'alias' => 'ProfilesSkill',
                            'type' => 'INNER',
                            'conditions' => array('Profile.id = ProfilesSkill.profile_id')
                        ),
                        array(
                            'table' => 'skills',
                            'alias' => 'Skill',
                            'type' => 'INNER',
                            'conditions' => array('ProfilesSkill.skill_id = Skill.id')
                        )
                    );
                break;
            }
        }

        // Retrieve member list, have to retrieve the Profile so that the skills get returned
        $this->paginate = $this->paginateOptions;
        $this->set('users', $this->paginate('Profile'));
    }

    public function edit() {
        if($this->request->is('post')) {
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('Your account has been updated.');
                $this->redirect(array('action' => 'edit'));
            }

            $this->Session->setFlash('There was a problem saving your account settings. Please try again.');
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $this->User->find('first', array(
                'conditions' => array('User.id' => $this->Auth->user('id'))
            ));
        }
    }

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
            ),
            'fields' => array(
                'User.id'
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
                    $this->redirect($this->Auth->redirectUrl('/'));
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

    // Online indicator
    public function online($id = null) {
        $this->User->Profile->updateAll(
            array('last_active' => time() ),
            array('AND' => array('user_id' => $id) )
        );
    }
}