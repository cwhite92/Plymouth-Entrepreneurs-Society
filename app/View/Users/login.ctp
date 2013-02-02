<h1>Login</h1>

<?php echo $this->Session->flash('auth'); ?>

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->form->end('Login'); ?>