<h2>Register</h2>

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('Profile.firstname'); ?>
<?php echo $this->Form->input('Profile.lastname'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('password', array('between' => 'Must be atleast 6 characters', 'value' => '', 'autocomplete' => 'off')); ?>
<?php echo $this->Form->input('confirmPassword', array('type' => 'password', 'value' => '', 'autocomplete' => 'off')); ?>
<?php echo $this->Form->end('Register'); ?>