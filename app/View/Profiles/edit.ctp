<div class="entry">
    <div class="content">
        <h1>Edit profile</h1>
        <?php echo $this->Form->create('Profile', array(
            'type'          => 'file',
            'inputDefaults' => array(
                'div'       => false
            )
        )); ?>
        <?php echo $this->Form->hidden('id'); ?>
        <div class="profilePicture clearfix">
            <?php echo $this->Html->image('profile_pics/' . $profile['Profile']['picture'], array(
                'alt'       => $profile['Profile']['firstname'] . ' ' . $profile['Profile']['lastname'] . '\'s profile picture',
                'id' => 'profile-picture'
            )); ?>
            <div class="options">
                <?php echo $this->Form->input('picture', array('type' => 'file')); ?>
                <div class="cf"></div>
                <?php if($profile['Profile']['picture'] != 'user.png'): ?>
                    <a href="#" class="removeProfilePic button" title="Remove profile picture">Remove picture</a>
                <?php endif; ?>
            </div><!-- END .options -->
        </div><!-- END .profilePicture -->
        <?php echo $this->Form->input('firstname'); ?>
        <?php echo $this->Form->input('lastname'); ?>
        <?php echo $this->Form->input('email', array(
            'after' => '<span class="description">This is the email other users will use to contact you.</span>'
        )); ?>
        <?php echo $this->Form->input('Skill', array('type' => 'text', 'value' => $skills, 'label' => 'Your skills (seperate each skill by a comma)')); ?>
        <?php echo $this->Form->input('course'); ?>
        <?php echo $this->Form->input('bio'); ?>
        <?php echo $this->Form->input('experience'); ?>
        <?php echo $this->Form->end('Save changes'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
