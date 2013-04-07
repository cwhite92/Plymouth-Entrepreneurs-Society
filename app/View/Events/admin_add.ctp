<h1>Add Event</h1>
<?php
    echo $this->Form->create('Event', array('type' => 'file'));
    echo $this->Form->input('Event.title');
    echo $this->Form->input('Event.poster', array('type' => 'file', 'label' => 'Event poster'));
    echo $this->Form->input('Event.location');
    echo $this->Form->input('Event.body', array('type' => 'textarea', 'class' => 'redactor'));
    echo $this->Form->input('Event.attachments.', array('type' => 'file', 'multiple', 'label' => 'Attachments (you may select more than one)'));
    echo $this->Form->input('date');
    echo $this->Form->end('Save Post');
?>