<?php

class SkillsController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
        $this->Auth->allow('index');
    }

    public function  index() {
        $this->set('skills', $this->Skill->find('all'));
    }

    public function view($name) {
        // URL decode the skill name
        $name = urldecode($name); 
        
        // Find skill using $name
        $skill = $this->Skill->find('first', array(
            'conditions' => array('Skill.name' => $name)
        ));

        if(!$skill) {
            // Skill doesn't exist, return 404
            // TODO: route to 404 page
            throw new NotFoundException();
        }

        $this->set('skill', $skill);
    }

}