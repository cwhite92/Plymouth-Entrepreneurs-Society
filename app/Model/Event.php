<?php
class Event extends AppModel {

    public $hasMany = 'Attachment';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        ),
        'picture' => array(
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

    public function validateImage($check) {
        if(!empty($this->data['Event']['picture']['name'])) {
            // Quickly check if the file is an image by trying to get its width/height
            if(@getimagesize($check['picture']['tmp_name'])) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function beforeSave($options = Array()) {
        if(!empty($this->data['Event']['poster']['name'])) {
            // Make a filename
            $filename = md5(microtime() * rand()) . '.png';

            // Attempt to move the uploaded file
            if(!move_uploaded_file($this->data['Event']['poster']['tmp_name'], WWW_ROOT . 'img' . DS . 'posters' . DS . $filename)) {
                return false;
            }

            // Rename it so it gets saved with the correct name in the database
            $this->data['Event']['poster'] = $filename;
        } elseif(isset($this->data['Event']['id'])) {
            unset($this->data['Event']['poster']);
        } else {
            return false;
        }

        return true;
    }
}