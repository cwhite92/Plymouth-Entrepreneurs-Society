<?php

class User extends AppModel {
    var $validate = array(
        'firstname' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Firstname is required'
            )
        ),
        'lastname' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Password is required'
            )
        ),
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
                'message' => 'Please Enter your email.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message'=>'Please enter a password.'
            ),
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password must be at least 6 characters in length'
            )
        ),
        'confirmPassword' => array(
            'length' => array(
                'rule' => 'validatePassword',
                'message' => 'Passwords don\'t match'
            )
        )
    );

    function validatePassword($data) {
        if ($this->data['User']['password'] !== $data['confirmPassword'])
        {
            return false;
        }
        return true;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
            unset($this->data['User']['passwd']);
        }

        if (isset($this->data['User']['passwd_confirm']))
        {
            unset($this->data['User']['passwd_confirm']);
        }

        return true;
    }
}