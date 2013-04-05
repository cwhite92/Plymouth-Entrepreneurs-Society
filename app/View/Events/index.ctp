<h1>Events</h1>
<p><?php echo $this->Html->link('Add Event', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo $event['Event']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $event['Event']['id']),
                    array('confirm' => 'Are you sure?'));
                ?>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id'])); ?>
            </td>
            <td>
                <?php echo $event['Event']['created']; ?>
            </td>
            <td>
                <?php echo $event['Event']['modified']; ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>