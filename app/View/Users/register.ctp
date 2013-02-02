<h1>Register</h1>

<?php echo $this->form->create('User'); ?>
<?php echo $this->form->input('firstname'); ?>
<?php echo $this->form->input('lastname'); ?>
<?php echo $this->form->input('email'); ?>
<?php echo $this->form->input('password'); ?>
<?php echo $this->form->end('Register'); ?>