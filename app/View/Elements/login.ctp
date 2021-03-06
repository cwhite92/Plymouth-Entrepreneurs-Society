<div class="entry login">
    <div class="content">
        <?php
        echo $this->Form->create('User', array(
            'url'               => array(
                'plugin'        => false,
                'controller'    => 'users',
                'action'        => 'login'
            ),
            'inputDefaults'     => array(
                'label'         => false,
                'div'           => false
            )
        ));

        echo $this->Form->input('email', array(
            'placeholder'   => 'Email',
            'required'      => 'required'
        ));

        echo $this->Form->input('password', array(
            'placeholder'   => 'Password',
            'required'      => 'required'
        ));

        echo $this->Form->submit('Sign In', array(
            'div'           => false
        ));
        ?>
        <?php echo $this->Html->link('Recover?', array('controller' => 'users', 'action' => 'recover', 'plugin' => false)); ?>
        <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register', 'plugin' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->