<?php

class Skill extends AppModel {

    public $hasAndBelongsToMany = 'Profile';

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Name is required.'
            ),
            'length' => array(
                'rule' => array('maxLength', 50),
                'message' => 'Each skill must be no more than 50 characters in length.'
            )            
        )
    );

}