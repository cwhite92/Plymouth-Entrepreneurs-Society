<h2>Plymouth Entrepreneurs Society</h2>

<?php if($authed): ?>
    <p>You're logged in!</p>
<?php endif; ?>

<h3>Latest users</h3>
<?php foreach($latestUsers as $user): ?>
    <?php echo $this->Html->link($user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'], array('controller' => 'profiles', 'action' => 'view', $user['Profile']['id'])); ?><br />
<?php endforeach; ?>