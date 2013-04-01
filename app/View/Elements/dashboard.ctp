<div class="entry dashboard">
    <div class="content">
    	<h1>Welcome back <?php echo $user['Profile']['firstname']; ?></h1>
        <?php
            echo $this->Html->image('profile_pics/' . $user['Profile']['picture'], array(
                'fullbase'  => true, 
                'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'] . '\'s profile picture',
                'width' => 25,
                'height' => 25
            )); 
        ?><?php echo $this->Html->link('Logout', array('plugin' => false, 'controller' => 'users', 'action' => 'logout')); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->