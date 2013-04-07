<h1 class="alignLeft">News</h1>
<?php echo $this->Html->link('Add News', array('action' => 'add'), array('class' => 'alignRight')); //TODO: put space between title and link?>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Modified</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['title']; ?></td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>
            <td>
                <?php echo $post['Post']['modified']; ?>
            </td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $post['Post']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions edit',
                        'data-icon' => '&#xF139;')); ?>
            </td>
            <td>
                <?php echo $this->Form->postLink('',
                    array(
                        'action' => 'delete',
                        $post['Post']['id']),
                    array(
                        'class' => 'actions delete',
                        'escape' => false,
                        'data-icon' => '&#xF155;'),
                    __('Are you sure you want to delete %s?',
                        $post['Post']['title'])); ?>

            </td>

        </tr>
    <?php endforeach; ?>

</table>