<div class="entry profile">
    <div class="content">
        <div class="vcard clearfix">
            <?php
            echo $this->Html->image('profile_pics/' . $profile['Profile']['picture'], array(
                'fullbase'  => true, 
                'alt'       => $profile['Profile']['firstname'] . ' ' . $profile['Profile']['lastname'] . '\'s profile picture'
            )); 
            ?>
            <span class="name"><?php echo $profile['Profile']['firstname']; ?> <?php echo $profile['Profile']['lastname']; ?></span>
            <span class="rank"><?php echo $this->requestAction('/Profiles/rank', array('pass' => array( $profile['User']['admin'] ))); ?></span>
            <ul>
                <li><strong>Status:</strong> <?php echo $this->requestAction('/Profiles/onlineStatus', array('pass' => array( $profile['Profile']['last_active'] ))); ?></li>
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
                <li><strong>Skills requested:</strong> Chris - this bit needs to be added</li>
                <li><strong>Last update:</strong> <?php echo $this->Time->format('d M Y', $profile['Profile']['modified']); ?></li>
            </ul>
        </div><!-- END .vcard -->

        <h2>About me</h2>
        <?php echo htmlspecialchars($profile['Profile']['bio']); ?>
        <h2>Experience</h2>
        Same with this bit, it also needs to be added. Boom.
    </div><!-- END .content -->
</div><!-- END .entry -->
<div class="entry profile">
    <div class="content">
        <h2>Contact <?php echo $profile['Profile']['firstname']; ?></h2>

        <?php echo $this->Form->create('Profile', array('type' => 'post')); ?>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Form->textarea('message'); ?>
        <?php echo $this->Form->end('Send message'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->