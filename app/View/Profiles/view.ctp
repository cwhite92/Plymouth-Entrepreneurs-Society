<div class="entry profile">
    <div class="content">
        <div class="vcard clearfix">
            <?php echo $this->Html->image('profile_pics/' . $profile['Profile']['picture'], array(
                'alt'       => $profile['Profile']['firstname'] . ' ' . $profile['Profile']['lastname'] . '\'s profile picture'
            )); ?>
            <span class="name"><?php echo $profile['Profile']['firstname']; ?> <?php echo $profile['Profile']['lastname']; ?></span>
            <span class="rank"><?php
                if($profile['User']['admin']) {
                    echo 'Admin';
                }; ?></span>
            <ul>
                <li><strong>Status:</strong> <?php
                    $currentTime = time();
                    $time = $profile['Profile']['last_active'];

                    if ($currentTime - $time <= 180) {
                        echo '<span class="status online"><span data-icon="&#xF0C7;"></span> Online</span>';
                    } else {
                        echo '<span class="status offline"><span data-icon="&#xF0C7;"></span> Offline</span>';
                    }
                    ?></li>
                <li><strong>Course:</strong> <?php echo htmlspecialchars($profile['Profile']['course']); ?></li>
                <li>
                    <strong>Skills:</strong>
                    <?php
                    $i = 0;
                    foreach($profile['Skill'] as $skill):

                        echo $this->Html->link($skill['name'], array(
                            'controller' => 'skills',
                            'action' => 'view',
                            urlencode($skill['name'])
                        ));
                        $i++;
                        // Checking if i is more than 0 and does not equals to total numb of ele/ in array
                        // echo ', s'
                        if ( $i > 0 && $i != count( $profile['Skill'] ) ) echo ', ';
                    endforeach;
                    ?>
                </li>
                <li><strong>Last update:</strong> <?php echo $this->Time->format('d M Y', $profile['Profile']['modified']); ?></li>
            </ul>
        </div><!-- END .vcard -->

        <h2>About me</h2>
        <?php echo htmlspecialchars($profile['Profile']['bio']); ?>
        <h2>Experience</h2>
        <?php echo htmlspecialchars($profile['Profile']['experience']); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
<?php if($authed): ?>
<div class="entry profile">
    <div class="content">
        <h2>Contact <?php echo $profile['Profile']['firstname']; ?></h2>

        <?php echo $this->Form->create('Profile', array('type' => 'post', 'action' => 'emailUser')); ?>
        <?php echo $this->Form->hidden('id', array('value' => $profile['Profile']['id'])); ?>
        <?php echo $this->Form->textarea('message'); ?>
        <?php echo $this->Form->end('Send message'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
<?php endif; ?>