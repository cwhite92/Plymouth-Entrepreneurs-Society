<h1>Add Page</h1>
<?php
echo $this->Form->create('Service');
echo $this->Form->input('title', array('required' => 'required'));
echo $this->Form->input('permalink', array('required' => 'required'));
echo $this->Form->input('body', array('type' => 'textarea','class' => 'redactor', 'required' => 'required', 'label' => 'Body'));
echo $this->Form->end('Save Post');
?>