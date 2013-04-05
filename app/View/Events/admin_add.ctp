<h1>Add Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('title', array('required' => 'required'));
echo $this->Form->input('poster', array('type' => 'file'));
echo $this->Form->textarea('body', array('class' => 'redactor', 'required' => 'required'));
echo $this->Form->end('Add Event');
?>