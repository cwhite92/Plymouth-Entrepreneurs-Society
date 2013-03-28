<div class="entry profile">
    <div class="content">
        <div class="meta clearfix">
            <?php 
            echo $this->Html->image('profile_pics/' . $profile['Profile']['picture'], array(
                'fullbase'  => true, 
                'alt'       => $profile['Profile']['firstname'] . ' ' . $profile['Profile']['lastname'] . '\'s profile picture'
            )); 
            ?>
            
            <h1><?php echo $profile['Profile']['firstname']; ?> <?php echo $profile['Profile']['lastname']; ?></h1>
            <ul>
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
        </div><!-- END .meta -->

        <h1>About me</h1>
        <?php echo htmlspecialchars($profile['Profile']['bio']); ?>
        <h1>Experience</h1>
        Same with this bit, it also needs to be added. Boom.
    </div><!-- END .content -->
</div><!-- END .entry -->
<div class="entry profile">
    <div class="content">
        <h1>Contact <?php echo $profile['Profile']['firstname']; ?></h1>

        <?php echo $this->Form->create('Profile', array('type' => 'post')); ?>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Form->textarea('message'); ?>
        <?php echo $this->Form->end('Send message'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->