<h2>Edit your profile</h2>

<?php echo $this->Form->create('Profile', array('type' => 'file')); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->label('Profile.picture', 'Profile picture'); ?>
<?php echo $this->Form->file('picture'); ?>
<?php echo $this->Form->input('firstname'); ?>
<?php echo $this->Form->input('lastname'); ?>
<?php echo $this->Form->input('email', array('between' => 'This is the email other users will use to contact you')); ?>
<?php echo $this->Form->input('Skill', array('type' => 'text', 'value' => $skills, 'label' => 'Your skills (seperate each skill by space)')); ?>
<?php echo $this->Form->input('course'); ?>
<?php echo $this->Form->input('bio'); ?>
<?php echo $this->Form->end('Save changes'); ?>