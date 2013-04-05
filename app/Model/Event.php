<?php
class Event extends AppModel {
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
                'rule' => array('fileSize', '<=', '700KB'),
                'message' => 'Picture must be less than 700KB'
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

    /**
     * For some reason, Cake won't call beforeSave() in our Skill model when saving a profile even with a HABTM relationship,
     * so unfortunately we have to have the skill logic in this Profile model...
     */
    public function beforeSave($options = Array()) {
        if(!empty($this->data['Event']['picture'])) {
            // Query for the users current profile picture
            $currentPicture = $this->find('first', array(
                'condition' => array(
                    'Event.id' => $this->data['Event']['id']
                ),
                'fields' => array('Event.picture')
            ));

            // Make a filename
            $filename = $this->data['Event']['id'] . '.png';

            // Attempt to move the uploaded file
            if(!move_uploaded_file($this->data['Event']['picture']['tmp_name'], WWW_ROOT . 'img' . DS . 'posters' . DS . $filename)) {
                return false;
            }

            // Also delete their old picture to save space (if it's not user.png)
//            unlink(WWW_ROOT . 'img' . DS . 'posters' . DS . $currentPicture['Event']['picture']);

            // Rename it so it gets saved with the correct name in the database
            $this->data['Event']['picture'] = $filename;
        } else {
            // Take the picture out of $this->data
            unset($this->data['Event']['picture']);
        }

        return true;
    }
}