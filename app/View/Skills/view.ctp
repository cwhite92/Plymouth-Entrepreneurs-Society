<div class="entry">
    <div class="content clearfix">
        <h1>People with the "<?php echo $skill['Skill']['name']; ?>" skill</h1>
        <ul class="membersList">
            <?php if(count($skill['Profile']) == 0): ?>
                <p>No users found :(</p>
            <?php else: ?>
                <?php foreach($skill['Profile'] as $user): ?>
                    <li>
                        <?php
                        echo $this->Html->link(
                            $this->Html->image('profile_pics/'.$user['picture'], array(
                                'fullbase'  => true,
                                'alt'       => $user['firstname'] . ' ' . $user['lastname']
                            )),
                            '/profile/'.$user['id'],
                            array('escape' => false, 'class' => 'pic')
                        );

                        echo $this->Html->link($user['firstname'].' '.$user['lastname'], array(
                            'controller'    => 'profiles',
                            'action'        => 'view',
                            $user['id']
                        ),array(
                            'escape'        => false
                        ));
                        ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div><!-- END .content -->
</div><!-- END .entry -->