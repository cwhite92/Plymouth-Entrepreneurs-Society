<h1>Add Sponsor</h1>
<?php
echo $this->Form->create('Sponsor', array('type' => 'file'));
echo $this->Form->input('name', array('required' => 'required'));
echo $this->Form->input('picture', array('type' => 'file', 'required' => 'required'));
echo $this->Form->end('Save Sponsor');
?>