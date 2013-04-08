<div class="entry register">
    <div class="content">
        <h1>RECOVER</h1>
        <p>Enter your new password below.</p>
        <?php
        echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'div'       => false
            )
        ));

        echo $this->Form->input('newPassword', array(
            'label' => 'New Password',
            'type' => 'password',
            'between' => 'Must be atleast 6 characters',
            'value' => '',
            'autocomplete' => 'off'));

        echo $this->Form->input('confirmNewPassword', array(
            'type' => 'password',
            'value' => '',
            'autocomplete' => 'off'));

        echo $this->Form->submit('Set new password', array(
            'div'           => false
        ));

        echo $this->Form->end(); 
        ?>
    </div><!-- END .content -->
</div><!-- END .entry -->