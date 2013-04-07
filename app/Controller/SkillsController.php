<?php

class SkillsController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'index');
    }

    public function index() {
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

        $this->set('skill', $skill);
    }

}