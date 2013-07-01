<?php

class Post extends AppModel {
    public $belongsTo = 'User';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'blankPost'
        ),
        'cover_photo' => array(
            'kosher' => array(
                'rule' => 'validateImage',
                'message' => 'Only images are allowed to be uploaded'
            ),
            'size' => array(
//                'rule' => array('fileSize', '<=', '800KB'),
                'message' => 'Picture must be less than 800KB'
            )
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

    public function validateImage($check) {
        if(!empty($this->data['Post']['cover_photo']['name'])) {
            // Quickly check if the file is an image by trying to get its width/height
            if(@getimagesize($check['cover_photo']['tmp_name'])) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function beforeSave($options = Array()) {
        if(!empty($this->data['Post']['cover_photo']['name'])) {
            // Make a filename
            $filename = md5(microtime() * rand()) . '.png';

            // Attempt to move the uploaded file
            if(!move_uploaded_file($this->data['Post']['cover_photo']['tmp_name'], WWW_ROOT . 'img' . DS . 'cover_photo' . DS . $filename)) {
                return false;
            }

            // Rename it so it gets saved with the correct name in the database
            $this->data['Post']['cover_photo'] = $filename;
        }

        return true;
    }
}