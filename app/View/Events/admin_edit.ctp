<h1>Edit Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('title');
echo $this->Form->input('picture', array('type' => 'file'));
echo $this->Form->input('location');
echo $this->Form->input('body', array('type' => 'textarea', 'class' => 'redactor'));
echo $this->Form->input('date');
echo $this->Form->end('Save Post');