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
        $this->Auth->allow('register', 'activate', 'recover', 'recoverStepTwo', 'login', 'memberList');
    }

    // Admin panel homepage
    public function admin_home() {
        $this->set('pageTitle', 'Admin Panel');
        $this->set('currentPage', 'home');

        $this->layout = 'admin';
    }

    public function admin_index() {
        $this->set('pageTitle', 'Users - Admin Panel');
        $this->set('currentPage', 'users');

        $this->set('users', $this->User->find('all'));
        $this->layout = 'admin';
    }

    public function admin_edit($id = null) {
        $this->set('pageTitle', 'Edit User - Admin Panel');
        $this->set('currentPage', 'users');

        $user = $this->User->findById($id);
        if(!$user) {
            throw new NotFoundException('Invalid user');
        }

        if($this->request->is('post')) {
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('Account has been updated.');
                $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash('There was a problem saving the account settings. Please try again.');
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $user;
        }

        $this->layout = 'admin';
    }

    public function admin_delete($id) {
        if($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $profile = $this->Profile->find('first', array(
            'conditions' => array('Profile.user_id' => $id)));

        if($this->Profile->delete($profile['Profile']['id'])){
            if($this->User->delete($id, true)) {
                $this->Session->setFlash( $profile['User']['email'] . ' has been deleted.');
                $this->redirect(array('action' => 'index'));
            }
        }

        $this->layout = 'admin';
    }

    public function recover($hash = null) {
        $this->set('pageTitle', 'Recover - Plymouth Entrepreneurs Society');

        if($this->request->is('post')) {
            if(isset($this->request->data['User']['email'])) {
                // Try and find the user this email belongs to
                $user = $this->User->findByEmail($this->request->data['User']['email']);
                if(!$user) {
                    $this->Session->setFlash('That email address does not belong to a user.', 'default', array('class' => 'error'));
                    $this->redirect(array('controller' => 'users', 'action' => 'recover'));
                }
                $this->request->data['User']['id'] = $user['User']['id'];

                // Create a recovery hash and set recovered to 0
                $this->request->data['User']['recovery'] = md5(microtime());
                $this->request->data['User']['recovered'] = 0;

                // Save user
                if($this->User->save($this->request->data)) {
                    // Send recovery email
                    $email = new CakeEmail('default');
                    $email->viewVars(array(
                        'emailTitle' => 'Password recovery request',
                        'name' => $user['Profile']['firstname'],
                        'recover' => $this->request->data['User']['recovery']
                    ))->to($user['User']['email'])->subject('Password recovery request')->template('recover')->send();

                    $this->Session->setFlash('A recovery link has been sent to you.', 'default', array('class' => 'success'));
                    $this->redirect(array('controller' => 'users', 'action' => 'recover'));
                }

                $this->Session->setFlash('Unable to send you a recovery link.', 'default', array('class' => 'error'));
                $this->redirect(array('controller' => 'users', 'action' => 'recover'));
            }
        }
    }

    public function recoverStepTwo($hash = null) {
        $this->set('pageTitle', 'Recover - Plymouth Entrepreneurs Society');

        // Try to find the user ID
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.recovery' => $hash
            )
        ));

        if(!$user) {
            $this->Session->setFlash('Invalid recovery link, follow the one from your email.', 'default', array('class' => 'error'));
            $this->redirect(array('controller' => 'users', 'action' => 'recover'));
        }

        // Set the user ID
        $this->request->data['User']['id'] = $user['User']['id'];

        if($this->request->is('post') || $this->request->is('put')) {
            // Try to save the user with the given form data
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('Your password has been changed, you may now login with your new password.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $this->Session->setFlash('Unable to update your user account with the new password.', 'default', array('class' => 'error'));
            $this->redirect(array('controller' => 'users', 'action' => 'recover'));
        }
    }

    // Has to be called memberList because of some type of reserved word
    public function memberList() {
        $this->set('pageTitle', 'Members List - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'members');

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
        $this->set('pageTitle', 'Edit Account - Plymouth Entrepreneurs Society');

        if($this->request->is('post')) {
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('Your account has been updated.', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'edit'));
            }

            $this->Session->setFlash('There was a problem saving your account settings. Please try again.', 'default', array('class' => 'error'));
        }

        // Auto populate form fields
        if(!$this->request->data) {
            $this->request->data = $this->User->find('first', array(
                'conditions' => array('User.id' => $this->Auth->user('id'))
            ));
        }
    }

    public function register() {
        $this->set('pageTitle', 'Register - Plymouth Entrepreneurs Society');

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

                    $this->Session->setFlash('You have been registered. Please check your email for an activation code. If it does not appear in five minutes, check your junk folder.', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'register'));
                }
            }

            $this->Session->setFlash('There was a problem registering your account. Please try again.', 'default', array('class' => 'error'));
        }
    }

    public function activate($hash = null) {
        $this->set('pageTitle', 'Activate - Plymouth Entrepreneurs Society');

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
            throw new NotFoundException('Invalid user, please follow the activation link in your email.', 'default', array('class' => 'error'));
        }

        $user['User']['activated'] = true;
        $this->User->save($user);

        $this->Session->setFlash('Your account has been activated. You may now proceed to log in.', 'default', array('class' => 'success'));
        $this->redirect(array('controller' => 'posts', 'action' => 'index'));
    }

    public function login() {
        $this->set('pageTitle', 'Login - Plymouth Entrepreneurs Society');

        if($this->request->is('post')) {
            if($this->Auth->login()) {
                // We must check if the user has activated their account
                $user = $this->User->findByEmail($this->Auth->user('email'));
                if(!$user['User']['activated']) {
                    // They haven't activated, log them back out
                    $this->Auth->logout();
                    $this->Session->setFlash('You must activate your account before you can log in. Please check your email for details.', 'default', array('class' => 'error'));
                } else {
                    $this->redirect($this->Auth->redirect());
                }
            } else {
                $this->Session->setFlash('Invalid username or password, try again.', 'default', array('class' => 'error'));
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