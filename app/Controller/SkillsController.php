<?php

class SkillsController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'index');
    }

    public function index() {
        $this->set('pageTitle', 'Skills - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'skills');

        $this->set('skills', $this->Skill->find('all', array(
            'order' => array('name ASC')
        )));
    }

    public function view($name) {
        // URL decode the skill name
        $name = urldecode($name); 
        
        // Find skill using $name
        $skill = $this->Skill->find('first', array(
            'conditions' => array('Skill.name' => $name)
        ));

        if(!$skill) {
            throw new NotFoundException();
        }

        $this->set('pageTitle', 'People with the ' . $skill['Skill']['name'] . ' skill - Plymouth Entrepreneurs Society');
        $this->set('currentPage', 'skills');

        $this->set('skill', $skill);
    }

}