<div>
    <div class="whiteBox"><!-- BEGIN .whiteBox -->
        <div class="content"><!-- BEGIN .content -->
            <h1>Register.</h1>

            <?php echo $this->Form->create('User', array(
                'inputDefaults' => array(
                    'label' => false,
                    'div' => false
                )
            )); ?>
            <!-- BEGIN .row -->
            <div class="row">
                <div class="span6"><!-- BEGIN .span6 -->
                    <fieldset>
                        <label for="ProfileFirstname">Firstname<span class="required">*</span></label>
                        <div class="fieldWrap">
                            <?php echo $this->Form->input('Profile.firstname', array(
                                'placeholder'   => 'John',
                                'required'      => 'required'
                            )); ?>
                        </div>
                    </fieldset>
                </div><!-- END .span6 -->
                <div class="span6"><!-- BEGIN .span6 -->
                    <fieldset>
                        <label for="ProfileLastname">Lastname<span class="required">*</span></label>
                        <div class="fieldWrap">
                            <?php echo $this->Form->input('Profile.lastname', array(
                                'placeholder'   => 'Doe',
                                'required'      => 'required'
                            )); ?>
                        </div>
                    </fieldset>
                </div><!-- END .span6 -->
            </div>
            <!-- END .row -->
            <!-- BEGIN .row -->
            <div class="row">
                <div class="span12"><!-- BEGIN .span12 -->
                    <fieldset>
                        <label for="UserEmail">E-mail<span class="required">*</span></label>
                        <div class="fieldWrap">
                            <?php echo $this->Form->input('email', array(
                                'placeholder'   => 'name@email.com',
                                'required'      => 'required'
                            )); ?>
                        </div>
                        <div class="notice">
                            Email will be used for this, this and this.
                        </div>
                    </fieldset>
                </div><!-- END .span12 -->
            </div>
            <!-- END .row -->
            <!-- BEGIN .row -->
            <div class="row">
                <div class="span6"><!-- BEGIN .span6 -->
                    <fieldset>
                        <label for="UserPassword">Password<span class="required">*</span></label>
                        <div class="fieldWrap">
                            <?php echo $this->Form->input('password', array(
                                'type'          => 'password',
                                'value'         => '',
                                'required'      => 'required',
                                'autocomplete'  => 'off'
                            )); ?>
                        </div>
                    </fieldset>
                </div><!-- END .span6 -->
                <div class="span6"><!-- BEGIN .span6 -->
                    <fieldset>
                        <label for="UserConfirmPassword">Repeat Password<span class="required">*</span></label>
                        <div class="fieldWrap">
                            <?php echo $this->Form->input('confirmPassword', array(
                                'type'          => 'password',
                                'value'         => '',
                                'required'      => 'required',
                                'autocomplete'  => 'off'
                            )); ?>
                        </div>
                    </fieldset>
                </div><!-- END .span6 -->
            </div>
            <!-- END .row -->
            <!-- BEGIN .row -->
            <div class="row">
                <div class="span12">
                    <div class="notice">
                            Must be atleast 6 characters.
                    </div>
                </div>
            </div>
            <!-- END .row -->
            <!-- BEGIN .row -->
            <div class="row clearfix">
                <div class="span12"><!-- BEGIN .span12 -->
                    <div class="notice">
                        By clicking Create my account, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Use Policy</a>, including our <a href="#">Cookie Use</a>.
                    </div>
                    <fieldset>
                        <div class="buttons">
                            <?php echo $this->Form->end('Create my account'); ?>
                        </div>
                    </fieldset>
                </div><!-- END .span12 -->
            </div>
            <!-- END .row -->
        </div><!-- END .content -->
    </div><!-- END .whiteBox -->
</div>