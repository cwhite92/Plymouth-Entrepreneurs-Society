<h1>Add Post</h1>
<?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('Post.title');
    echo $this->Form->input('Post.body', array('type' => 'textarea','class' => 'redactor', 'required' => 'required', 'label' => 'Body'));
    echo $this->Form->end('Save Post');
?>