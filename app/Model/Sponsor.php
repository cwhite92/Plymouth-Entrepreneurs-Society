<?php

class Sponsor extends AppModel {

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
        ),
        'picture' => array(
            'kosher' => array(
                'rule' => 'validateImage',
                'message' => 'Only images are allowed to be uploaded.'
            ),
            'size' => array(
                'rule' => array('fileSize', '<=', '800KB'),
                'message' => 'Picture must be less than 800KB.'
            )
        )
    );

    public function validateImage($check) {
        if(!empty($this->data['Sponsor']['picture']['name'])) {
            // Quickly check if the file is an image by trying to get its width/height
            if(@getimagesize($check['picture']['tmp_name'])) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function beforeSave() {
        if(!empty($this->data['Sponsor']['picture']['name'])) {
            // Make a filename
            $filename = md5(microtime() * rand()) . '.png';

            // Attempt to move the uploaded file
            if(!move_uploaded_file($this->data['Sponsor']['picture']['tmp_name'], WWW_ROOT . 'img' . DS . 'sponsors' . DS . $filename)) {
                return false;
            }

            // Rename it so it gets saved with the correct name in the database
            $this->data['Sponsor']['picture'] = $filename;
        } else {
            // Take the picture out of $this->data
            unset($this->data['Sponsor']['picture']);
        }

        return true;
    }
}