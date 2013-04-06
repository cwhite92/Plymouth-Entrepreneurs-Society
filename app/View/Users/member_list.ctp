<h1>Members list</h1>
<?php echo $this->Form->create('User', array('action' => 'memberList')); ?>
<?php echo $this->Form->textbox('query', array('placeholder' => 'Enter search term...')); ?>
<?php echo $this->Form->radio('type', array('name' => 'Name search', 'skill' => 'Skill search'), array('value' => 'name')); ?>
<?php echo $this->Form->end('Search'); ?>
<ul>
    <?php if(count($users) == 0): ?>
        <p>No users found :(</p>
    <?php else: ?>
        <?php foreach($users as $user): ?>
            <li>
                <?php echo $this->Html->link($user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'], array('controller' => 'profiles', 'action' => 'view', $user['Profile']['id']), array('escape' => false)); ?>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

<?php echo $this->Paginator->numbers(); ?>