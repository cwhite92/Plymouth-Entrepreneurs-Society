<?php

class User extends AppModel {
    public $validate = array(
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
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email is required'
            ),
            'validEmail' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid email'
            )
        ),
        'password' => array(
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password must be at least 6 characters in length'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}