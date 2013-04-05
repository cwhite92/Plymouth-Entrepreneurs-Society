<h1>Edit Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('title');
echo $this->Form->input('poster', array('type' => 'file'));
echo $this->Form->input('body', array('class' => 'redactor'));
echo $this->Form->end('Save Post');