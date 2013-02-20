<h1>TODO: Homepage</h1>

<?php if($authed): ?>
    <p>You're logged in!</p>
<?php endif; ?>

<h1>Latest users</h1>
<?php foreach($latestUsers as $user): ?>
    <?php echo $this->Html->link($user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'], array('controller' => 'profiles', 'action' => 'view', $user['Profile']['id'])); ?><br />
<?php endforeach; ?>