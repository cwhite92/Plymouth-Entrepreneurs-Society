<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->hidden('id');
echo $this->Form->input('title', array('required' => 'required'));
echo $this->Form->input('cover_photo', array('type' => 'file', 'label' => 'Cover Photo'));
echo $this->Form->input('body', array('type' => 'textarea','class' => 'redactor', 'required' => 'required', 'label' => 'Body'));
echo $this->Form->end('Save Post');
?>