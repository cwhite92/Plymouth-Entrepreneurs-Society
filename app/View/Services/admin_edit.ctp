<h1>Edit Page</h1>
<?php
echo $this->Form->create('Service');
echo $this->Form->input('title');
echo $this->Form->input('permalink');
echo $this->Form->input('body', array('type' => 'textarea','class' => 'redactor', 'required' => 'required', 'label' => 'Body'));
echo $this->Form->end('Save Post');
?>