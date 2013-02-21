<h2><?php echo $profile['Profile']['firstname']; ?> <?php echo $profile['Profile']['lastname']; ?></h2>

<h4>Member information</h4>
Course: <?php echo $profile['Profile']['course']; ?><br />
Skills: 
<?php foreach($profile['Skill'] as $skill): ?>
    <?php echo $this->Html->link($skill['name'], array('controller' => 'skills', 'action' => 'view', $skill['id'])); ?>
<?php endforeach; ?>
<br />
Last update: <?php echo $this->Time->format('d M Y', $profile['Profile']['modified']); ?><br /><br />

<h4>Biography</h4>
<?php echo $profile['Profile']['bio']; ?>