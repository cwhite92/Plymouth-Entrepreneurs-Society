<?php

class Post extends AppModel {
    public $belongsTo = 'User';
    public $hasMany = 'Attachment';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}