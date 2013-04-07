<h1>Edit Event</h1>
<?php
    echo $this->Form->create('Event', array('type' => 'file'));
    echo $this->Form->hidden('id');
    echo $this->Form->input('title');
    echo $this->Form->input('poster', array('type' => 'file', 'label' => 'Event poster'));
    echo $this->Form->input('location');
    echo $this->Form->input('body', array('type' => 'textarea', 'class' => 'redactor'));
    echo $this->Form->input('date');
    echo $this->Form->end('Save Post');
?>