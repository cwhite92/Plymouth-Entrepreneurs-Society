<h1>Edit your profile</h1>

<?php echo $this->Form->create('Profile', array('type' => 'post')); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->hidden('User.id'); ?>
<?php echo $this->Form->input('firstname'); ?>
<?php echo $this->Form->input('lastname'); ?>
<?php echo $this->Form->input('User.email'); ?>
<?php echo $this->Form->input('course'); ?>
<?php echo $this->Form->input('bio'); ?>
<?php echo $this->Form->end('Save changes'); ?>