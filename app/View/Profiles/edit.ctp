<div class="entry">
    <div class="content">
        <h1>Edit your profile</h1>
        <?php echo $this->Form->create('Profile', array(
            'type'          => 'file',
            'inputDefaults' => array(
                'div'       => false
            )
        )); ?>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Html->image('profile_pics/' . $profile['Profile']['picture'], array(
            'fullbase'  => true, 
            'alt'       => $profile['Profile']['firstname'] . ' ' . $profile['Profile']['lastname'] . '\'s profile picture',
            'id' => 'profile-picture'
        )); ?>
        <?php echo $this->Form->input('picture', array('type' => 'file')); ?>
        <?php echo $this->Form->button('Delete profile picture', array(
            'type' => 'button',
            'id' => 'deletePictureButton',
            'class' => 'button'
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
