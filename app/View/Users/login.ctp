<div class="entry">
    <div class="content">
        <h1>Login</h1>
        <?php
        echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'div'       => false
            )
        ));

        echo $this->Form->input('email');
        echo $this->Form->input('password');

        echo $this->Form->end('Login');
        ?>
    </div><!-- END .content -->
</div><!-- END .entry -->