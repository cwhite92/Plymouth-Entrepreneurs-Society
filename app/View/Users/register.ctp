<div class="entry register">
    <div class="content">
        <h1>Register</h1>
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

        echo $this->Form->input('agree', array(
            'type'          => 'checkbox',
            'value'         => '',
            'required'      => 'required',
            'autocomplete'  => 'off',
            'label'         => 'I agree to the ToS and am over 13 years of age'
        ));

        echo $this->Form->submit('Register', array(
            'div'           => false
        ));

        echo $this->Form->end(); 
        ?>
    </div><!-- END .content -->
</div><!-- END .entry -->