<div class="entry">
    <div class="content search">
        <h1>Members list</h1>
        <?php echo $this->Form->create('User', array('action' => 'memberList')); ?>
        <?php echo $this->Form->textbox('query', array('placeholder' => 'Enter search term...')); ?>
        <?php echo $this->Form->radio('type', array('name' => 'Name search', 'skill' => 'Skill search'), array('value' => 'name')); ?>
        <?php echo $this->Form->end('Search'); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
<div class="entry">
    <div class="content clearfix">
        <ul class="membersList">
            <?php if(count($users) == 0): ?>
                <p>No users found :(</p>
            <?php else: ?>
                <?php foreach($users as $user): ?>
                    <li>
                        <?php
                        echo $this->Html->link(
                            $this->Html->image('profile_pics/'.$user['Profile']['picture'], array(
                                'fullbase'  => true,
                                'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname']
                            )),
                            '/profile/'.$user['Profile']['id'],
                            array('escape' => false, 'class' => 'pic')
                        );

                        echo $this->Html->link($user['Profile']['firstname'].' '.$user['Profile']['lastname'], array(
                            'controller'    => 'profiles',
                            'action'        => 'view',
                            $user['Profile']['id']
                        ),array(
                            'escape'        => false,
                            'class'         => 'name'
                        ));
                        ?>
                        <span class="skills">
                        <?php
                        $i = 0;
                        foreach($user['Skill'] as $skill):
                            echo $this->Html->link($skill['name'], array(
                                'controller'    => 'skills',
                                'action'        => 'view',
                                urlencode($skill['name'])
                            ));
                            $i++;
                            if ( $i != count( $user['Skill'] ) ) echo ', ';
                        endforeach;
                        ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <?php echo $this->Paginator->numbers(); ?>
    </div><!-- END .content -->
</div><!-- END .entry -->