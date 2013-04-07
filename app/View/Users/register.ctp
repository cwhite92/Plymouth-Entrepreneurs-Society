<div class="entry register">
    <div class="content">
        <h1>REGISTER</h1>
        <?php
        echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'div'       => false
            )
        ));

        echo $this->Form->input('Profile.firstname', array(
            'placeholder'   => 'John',
            'required'      => 'required'
        ));

        echo $this->Form->input('Profile.lastname', array(
            'placeholder'   => 'Doe',
            'required'      => 'required'
        ));

        echo $this->Form->input('email', array(
            'placeholder'   => 'name@email.com',
            'required'      => 'required'
        ));

        echo $this->Form->input('password', array(
            'type'          => 'password',
            'value'         => '',
            'required'      => 'required',
            'autocomplete'  => 'off'
        ));

        echo $this->Form->input('confirmPassword', array(
            'type'          => 'password',
            'value'         => '',
            'required'      => 'required',
            'autocomplete'  => 'off'
        ));

        echo $this->Form->submit('Register', array(
            'div'           => false
        ));

        echo $this->Form->end(); 
        ?>
    </div><!-- END .content -->
</div><!-- END .entry -->