<div class="entry dashboard">
    <div class="content clearfix">
        <?php
            echo $this->Html->link(
                    $this->Html->image('profile_pics/' . $user['Profile']['picture'], array(
                    'fullbase'  => true, 
                    'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'] . '\'s profile picture',
                )),
                '/profile/'.$user['Profile']['id'],
                array(
                    'escape'    => false,
                    'class'     => 'avatar'
                ));
        ?>
        Hello <?php echo $user['Profile']['firstname']; ?>
        <a class="settings" href="#" data-icon="&#xF04E;"></a>
        <ul>
            <?php if($user['User']['admin'] == 1): ?>
            <li><?php echo $this->Html->link('Admin Panel', '/admin', array('plugin' => false, 'escape' => false)); ?></li>
            <?php endif; ?>
            <li><?php echo $this->Html->link('Edit Profile', array('plugin' => false, 'controller' => 'profiles', 'action' => 'edit')); ?></li>
            <li><?php echo $this->Html->link('Sign out', array('plugin' => false, 'controller' => 'users', 'action' => 'logout')); ?></li>
        </ul>
    </div><!-- END .content -->
</div><!-- END .entry -->