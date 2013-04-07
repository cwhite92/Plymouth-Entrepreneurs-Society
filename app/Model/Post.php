<?php

class Post extends AppModel {
    public $belongsTo = 'User';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'blankPost'
        )
    );

    public function blankPost() {
        /* store body data in temp variable
        /  strip tags from temp
        /  check if the temp has any remaining txt
        */
        $temp = $this->data['Post']['body'];
        $temp = trim(strip_tags($temp));
        if (strlen($temp) !== 0) {
            return true;
        }

        return false;
    }
}