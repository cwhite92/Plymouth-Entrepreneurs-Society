<h2>Edit account details</h2>

<?php echo $this->Form->create('User', array('type' => 'post')); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->input('currentPassword', array('between' => 'You must enter your password in order to make changes', 'type' => 'password', 'value' => '', 'autocomplete' => 'off')); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('newPassword', array('label' => 'New Password (leave blank to keep your current password)', 'type' => 'password', 'between' => 'Must be atleast 6 characters', 'value' => '', 'autocomplete' => 'off')); ?>
<?php echo $this->Form->input('confirmNewPassword', array('type' => 'password', 'value' => '', 'autocomplete' => 'off')); ?>
<?php echo $this->Form->end('Save changes'); ?>