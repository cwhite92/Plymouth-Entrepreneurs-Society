<div class="widget hiddenPhone dashboard dashboardMain">
    <?php echo $this->Session->flash('auth'); ?>

    <?php echo $this->Form->create('User', array('url' => array('plugin' => false, 'controller' => 'users', 'action' => 'login'))); ?>
    <?php echo $this->Form->input('email'); ?>
    <?php echo $this->Form->input('password'); ?>
    <?php echo $this->Form->end('Sign In'); ?>
    <fieldset>
        <div class="buttons">
            <a href="#">Lost Password?</a> 
            <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?>
        </div>
    </fieldset>
</div>