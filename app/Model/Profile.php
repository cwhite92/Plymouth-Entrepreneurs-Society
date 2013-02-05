<?php

class Profile extends AppModel {

    public $belongsTo = 'User';

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
        )
    );

}