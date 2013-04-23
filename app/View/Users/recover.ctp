<div class="entry register">
    <div class="content">
        <h1>Recover</h1>
        <p>Enter your account email address below and a recovery link will be emailed to you.</p>
        <?php
        echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'div'       => false
            )
        ));

        echo $this->Form->input('User.email', array(
            'required'      => 'required'
        ));

        echo $this->Form->submit('Recover password', array(
            'div'           => false
        ));

        echo $this->Form->end(); 
        ?>
    </div><!-- END .content -->
</div><!-- END .entry -->