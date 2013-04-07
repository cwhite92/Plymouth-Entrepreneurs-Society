<h1>Add Sponsor</h1>
<?php
echo $this->Form->create('Sponsor', array('type' => 'file'));
echo $this->Form->input('name');
echo $this->Form->input('picture', array('type' => 'file'));
echo $this->Form->end('Save Sponsor');
?>