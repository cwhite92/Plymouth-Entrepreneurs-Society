<?php
App::uses('CakeEmail', 'Network/Email');
class PagesController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('home');
    }

    public function home() {
        $this->loadModel('User');

        // Get the latest members
        $latestUsers = $this->User->find('all', array(
            'order' => array('User.created'),
            'limit' => 5
        ));
        $this->set('latestUsers', $latestUsers);

        // Get the latest active time for all members
        $latestUsers = $this->User->find('all', array(
            'order' => array('User.created'),
            'limit' => 5
        ));
        $this->set('latestUsers', $latestUsers);
    }

}