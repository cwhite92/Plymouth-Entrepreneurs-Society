<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jakechampion
 * Date: 05/04/2013
 * Time: 15:03
 * To change this template use File | Settings | File Templates.
 */
class Event extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        ),
        'poster' => array(
            'kosher' => array(
                'rule' => 'validateImage',
                'message' => 'Only images are allowed to be uploaded'
            ),
            'size' => array(
                'rule' => array('fileSize', '<=', '2MB'),
                'message' => 'Picture must be less than 2 MB'
            )
        )
    );

    public function validateImage($check) {
        if(!empty($this->data['Event']['profile']['name'])) {
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
            // Query for the users current profile picture
            $currentPicture = $this->find('first', array(
                'condition' => array(
                    'Event.id' => $this->data['Event']['id']
                ),
                'fields' => array('Event.poster')
            ));

            // Make a filename
            $filename = md5(microtime() * rand()) . '.png';

            // Attempt to move the uploaded file
            if(!move_uploaded_file($this->data['Event']['poster']['tmp_name'], WWW_ROOT . 'img' . DS . 'posters' . DS . $filename)) {
                return false;
            }

            // Rename it so it gets saved with the correct name in the database
            $this->data['Events']['poster'] = $filename;
        } else {
            // Take the picture out of $this->data
            unset($this->data['Event']['poster']);
        }

        return true;
    }
}