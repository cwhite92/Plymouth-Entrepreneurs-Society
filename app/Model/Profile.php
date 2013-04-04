<?php

class Profile extends AppModel {

    public $belongsTo = 'User';
    public $hasAndBelongsToMany = 'Skill';

    public $validate = array(
        'firstname' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Firstname is required.'
            )
        ),
        'lastname' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Lastname is required.'
            )
        ),
        'email' => array(
            'kosher' => array(
                'rule' => 'email',
                'message' => 'Please make sure your email is entered correctly.'
            ),
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your email.'
            )
        ),
        'picture' => array(
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
        if(!empty($this->data['Profile']['picture']['name'])) {
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
        if(!empty($this->data['Profile']['picture']['name'])) {
            // Make a filename
            $filename = md5(microtime() * rand()) . '.png';

            // Attempt to move the uploaded file
            if(!move_uploaded_file($this->data['Profile']['picture']['tmp_name'], WWW_ROOT . 'img' . DS . 'profile_pics' . DS . $filename)) {
                return false;
            }

            // Query for the old filename so we can delete it
            $oldFilename = $this->find('first', array(
                'condition' => array('Profile.id' => $this->data['Profile']['id']),
                'fields' => array('Profile.picture')
            ));
            unlink(WWW_ROOT . 'img' . DS . 'profile_pics' . DS . $oldFilename['Profile']['picture']);

            // Rename it so it gets saved with the correct name in the database
            $this->data['Profile']['picture'] = $filename;
        } else {
            // Take the picture out of $this->data
            unset($this->data['Profile']['picture']);
        }

        // If we have skills to save, do it here
        if(isset($this->data['Skill']['Skill'])) {
            $skills = array_filter(explode(' ', $this->data['Skill']['Skill']));

            $this->data['Skill']['Skill'] = array();

            foreach($skills as $skill) {
                // Check if skill exists
                if(!$dbSkill = $this->Skill->findByName($skill)) {
                    // Doesn't exist, create it
                    $this->Skill->create();
                    $this->Skill->save(array('name' => $skill));
                } else {
                    // Does exist, use this skill
                    $this->Skill->set($dbSkill);
                }

                // Add this skill to our data collection
                $this->data['Skill']['Skill'][] = $this->Skill->id;
            }
        }

        return true;
    }
}