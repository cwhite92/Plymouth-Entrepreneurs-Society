<?php

class SkillsController extends AppController {

    public $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
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