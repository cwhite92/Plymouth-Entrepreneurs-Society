<div class="entry">
    <div class="content">
        <h2>Edit account details</h2>

        <?php echo $this->Form->create('User', array('type' => 'post', 'inputDefaults' => array('div' => false))); ?>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Form->input('currentPassword', array('after' => '<span class="description">You must enter your current password in order to make changes.</span>', 'type' => 'password', 'value' => '', 'autocomplete' => 'off')); ?>
        <?php echo $this->Form->input('email'); ?>
        <?php echo $this->Form->input('newPassword', array('label' => 'New Password (leave blank to keep your current password)', 'type' => 'password', 'after' => '<span class="description">Must be at least 6 characters.</span>', 'value' => '', 'autocomplete' => 'off')); ?>
        <?php echo $this->Form->end('Save changes'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
