<h1>Edit Contact info</h1>
<?php
echo $this->Form->create('About');
echo $this->Form->input('body', array('type' => 'textarea','class' => 'redactor', 'required' => 'required', 'label' => 'Body'));
echo $this->Form->end('Save');
?>