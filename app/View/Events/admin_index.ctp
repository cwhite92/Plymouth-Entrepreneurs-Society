<h1 class="alignLeft">Events</h1>
<?php echo $this->Html->link('Add Event', array('action' => 'add'), array('class' => 'alignRight')); ?>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Modified</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo $event['Event']['title']; ?></td>
            <td>
                <?php echo $event['Event']['created']; ?>
            </td>
            <td>
                <?php echo $event['Event']['modified']; ?>
            </td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $event['Event']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions edit',
                        'data-icon' => '&#xF139;')); ?>
            </td>
            <td>
                <?php echo $this->Form->postLink('',
                    array(
                        'action' => 'delete',
                        $event['Event']['id']),
                    array(
                        'class' => 'actions delete',
                        'escape' => false,
                        'data-icon' => '&#xF155;'),
                    __('Are you sure you want to delete %s?',
                        $event['Event']['title'])); ?>

            </td>

        </tr>
    <?php endforeach; ?>

</table>