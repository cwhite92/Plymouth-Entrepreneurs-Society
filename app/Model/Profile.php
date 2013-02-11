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
        ),
    );

}