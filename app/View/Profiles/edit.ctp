<div class="entry">
    <div class="content">
        <h1>Edit your profile</h1>
        <?php
        echo $this->Form->create('Profile', array(
            'type'          => 'file',
            'inputDefaults' => array(
                'div'       => false
            )
        ));
        ?>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Form->input('picture', array('type' => 'file')); ?>
        <?php echo $this->Form->input('deletePicture', array(
            'type' => 'checkbox',
            'label' => 'Delete profile picture',
            'after' => '<span class="description">Check this to remove your profile picture and use the default.</span>'
        )); ?>
        <?php echo $this->Form->input('firstname'); ?>
        <?php echo $this->Form->input('lastname'); ?>
        <?php echo $this->Form->input('email', array(
            'after' => '<span class="description">This is the email other users will use to contact you.</span>'
        )); ?>
        <?php echo $this->Form->input('Skill', array('type' => 'text', 'value' => $skills, 'label' => 'Your skills (seperate each skill by space)')); ?>
        <?php echo $this->Form->input('course'); ?>
        <?php echo $this->Form->input('bio'); ?>
        <?php echo $this->Form->end('Save changes'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
