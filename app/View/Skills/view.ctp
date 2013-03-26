<h1>People with the "<?php echo $skill['Skill']['name']; ?>" skill</h1>

<?php foreach($skill['Profile'] as $profile): ?>
	<h2><?php echo $this->Html->link($profile['firstname'] . ' ' . $profile['lastname'], array('controller' => 'profiles', 'action' => 'view', $profile['id'])); ?></h2>
<?php endforeach; ?>