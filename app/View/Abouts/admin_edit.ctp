<h1>Edit About info</h1>
<?php
echo $this->Form->create('About');
echo $this->Form->input('body', array('type' => 'textarea','class' => 'redactor', 'required' => 'required', 'label' => ''));
echo $this->Form->end('Save');
?>