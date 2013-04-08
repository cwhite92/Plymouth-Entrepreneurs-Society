<h1>Edit Event</h1>
<?php
    echo $this->Form->create('Event', array('type' => 'file'));
    echo $this->Form->hidden('id');
    echo $this->Form->input('title', array('required' => 'required'));
    echo $this->Form->input('poster', array('type' => 'file', 'label' => 'Event poster'));
    echo $this->Form->input('location', array('required' => 'required'));
    echo $this->Form->input('body', array('type' => 'textarea', 'class' => 'redactor', 'required' => 'required'));
    echo $this->Form->input('date', array('required' => 'required'));
    echo $this->Form->end('Save Post');
?>