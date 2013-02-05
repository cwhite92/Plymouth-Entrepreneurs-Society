<?php

class User extends AppModel {

    public $hasOne = 'Profile';

    public $validate = array(
        'email' => array(
            'kosher' => array(
                'rule' => 'email',
                'message' => 'Please make sure your email is entered correctly.'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'An account with that email already exists.'
            ),
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your email.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message'=>'Please enter a password.'
            ),
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password must be at least 6 characters in length.'
            )
        ),
        'confirmPassword' => array(
            'length' => array(
                'rule' => 'validatePassword',
                'message' => 'Passwords don\'t match.'
            )
        )
    );

    function validatePassword($data) {
        if($this->data['User']['password'] !== $data['confirmPassword']) {
            return false;
        }

        return true;
    }

    public function beforeSave($options = array()) {
        if(isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], 'blowfish');
            unset($this->data['User']['passwd']);
        }

        if(isset($this->data['User']['passwd_confirm'])) {
            unset($this->data['User']['passwd_confirm']);
        }

        return true;
    }
}