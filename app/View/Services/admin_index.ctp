<h1 class="alignLeft">Services</h1>
<?php echo $this->Html->link('Add a Page', array('action' => 'add')); //TODO: put space between title and link?>
<table>
    <tr>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($services as $service): ?>
        <tr>
            <td><?php echo $service['Post']['title']; ?></td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $service['Post']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions',
                        'data-icon' => '&#xF139;')); ?>
            </td>
            <td>
                <?php echo $this->Form->postLink('',
                    array(
                        'action' => 'delete',
                        $post['Post']['id']),
                    array(
                        'class' => 'actions',
                        'escape' => false,
                        'data-icon' => '&#xF155;'),
                    __('Are you sure you want to delete %s?',
                        $post['Post']['title'])); ?>

            </td>

        </tr>
    <?php endforeach; ?>

</table>