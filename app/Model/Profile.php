<?php

class Profile extends AppModel {

    public $belongsTo = 'User';
    public $hasAndBelongsToMany = 'Skill';

    public $validate = array(
        'firstname' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Firstname is required.'
            )
        ),
        'lastname' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Lastname is required.'
            )
        ),
        'email' => array(
            'kosher' => array(
                'rule' => 'email',
                'message' => 'Please make sure your email is entered correctly.'
            ),
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your email.'
            )
        )
    );

    /**
     * For some reason, Cake won't call beforeSave() in our Skill model when saving a profile even with a HABTM relationship,
     * so unfortunately we have to have the skill logic in this Profile model...
     */
    public function beforeSave() {
        // If we have skills to save, do it here
        if(isset($this->data['Skill']['Skill'])) {
            $skills = array_filter(explode(' ', $this->data['Skill']['Skill']));

            $this->data['Skill']['Skill'] = array();

            foreach($skills as $skill) {
                // Check if skill exists
                if(!$dbSkill = $this->Skill->findByName($skill)) {
                    // Doesn't exist, create it
                    $this->Skill->create();
                    $this->Skill->save(array('name' => $skill));
                } else {
                    // Does exist, use this skill
                    $this->Skill->set($dbSkill);
                }

                // Add this skill to our data collection
                $this->data['Skill']['Skill'][] = $this->Skill->id;
            }

            return true;
        }
    }

}