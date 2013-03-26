<h2><?php echo $profile['Profile']['firstname']; ?> <?php echo $profile['Profile']['lastname']; ?></h2>

<div class="profile-picture">
    <?php echo $this->Html->image('profile_pics/' . $profile['Profile']['picture'], array('fullbase' => true, 'alt' => $profile['Profile']['firstname'] . ' ' . $profile['Profile']['lastname'] . '\'s profile picture', 'width' => 226, 'height' => 226)); ?>
</div>

<h3>Member information</h3>
Course: <?php echo htmlspecialchars($profile['Profile']['course']); ?><br />
Skills: 
<?php foreach($profile['Skill'] as $skill): ?>
    <?php echo $this->Html->link($skill['name'], array('controller' => 'skills', 'action' => 'view', urlencode($skill['name']))); ?>
<?php endforeach; ?>
<br />
Last update: <?php echo $this->Time->format('d M Y', $profile['Profile']['modified']); ?><br /><br />

<h3>Biography</h3>
<?php echo htmlspecialchars($profile['Profile']['bio']); ?><br /><br />

<h3>Contact <?php echo $profile['Profile']['firstname']; ?></h3>

<?php echo $this->Form->create('Profile', array('type' => 'post')); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->input('message'); ?>
<?php echo $this->Form->end('Send message'); ?>