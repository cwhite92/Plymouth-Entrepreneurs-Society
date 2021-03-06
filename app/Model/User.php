<?php
App::uses('Security', 'Utility');

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
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your email.'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a password.'
            ),
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password must be at least 6 characters in length.'
            )
        ),
        'confirmPassword' => array(
            'custom' => array(
                'rule' => 'validateConfirmPassword',
                'message' => 'Passwords don\'t match.'
            )
        ),
        'currentPassword' => array(
            'custom' => array(
                'rule' => 'validateCurrentPassword',
                'message' => 'Incorrect password. Make sure you\'re using your current password.'
            )
        ),
        'agree' => array(
            'rule' => array('comparison', 'equal to', 1),
            'required' => false,
            'message' => 'You must agree to the Terms of Service in order to register.'
        )
    );

    // Used when a user changes their password
    public function beforeValidate($options = Array()) {
        // Change "newPassword" and "confirmNewPassword" to "password" and "confirmPassword"
        if(!empty($this->data[$this->alias]['newPassword'])) {
            $this->data[$this->alias]['password'] = $this->data[$this->alias]['newPassword'];
            unset($this->data[$this->alias]['newPassword']);
        }

        return true;
    }

    public function validateCurrentPassword($data) {
        // Retrieve current password from the database
        $storedPassword = $this->find('first', array(
            'conditions' => array('User.id' => $this->data['User']['id']),
            'fields' => array('User.password')
        ));

        // Hash user inputted password
        $check = Security::hash($data['currentPassword'], 'blowfish', $storedPassword['User']['password']);

        // Compare
        return ($storedPassword['User']['password'] === $check);
    }

    public function validateConfirmPassword($data) {
        if($this->data['User']['password'] !== $data['confirmPassword']) {
            return false;
        }

        return true;
    }

    public function beforeSave($options = Array()) {
        // Hash the password before saving
        if(isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], 'blowfish');
        }

        return true;
    }
}