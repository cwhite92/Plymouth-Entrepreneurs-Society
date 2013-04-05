<h1><?php echo h($event['Event']['title']); ?></h1>

<p><small>Created: <?php echo $event['Event']['created']; ?></small></p>

<p><?php echo h($event['Event']['body']); ?></p>



<li><strong>Last update:</strong> <?php echo $this->Time->format('d M Y', $event['Event']['modified']); ?></li>


<?php echo $this->Html->image('posters/' . $event['Event']['picture'], array(
    'alt'       => $event['Event']['title'] . '\'s poster'
)); ?>