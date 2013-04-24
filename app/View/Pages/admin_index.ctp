<h1 class="alignLeft">Pages</h1>
<?php echo $this->Html->link('Add Page', array('action' => 'add'), array('class' => 'alignRight')); ?>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Category</th>
        <th>In Header</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
    </tr>

    <?php foreach ($pages as $page): ?>
        <tr>
            <td><?php echo $page['Page']['title']; ?></td>
            <td>
                <?php echo $page['Page']['created']; ?>
            </td>
            <td>
                <?php echo $page['Page']['modified']; ?>
            </td>
            <td>
                <?php echo $page['Category']['name']; ?>
            </td>
            <td>
                <?php echo ($page['Page']['in_header'] ? 'Yes' : 'No'); ?>
            </td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $page['Page']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions edit',
                        'data-icon' => '&#xF139;')); ?>
            </td>
            <td>
                <?php echo $this->Form->postLink('',
                    array(
                        'action' => 'delete',
                        $page['Page']['id']),
                    array(
                        'class' => 'actions delete',
                        'escape' => false,
                        'data-icon' => '&#xF155;'),
                    __('Are you sure you want to delete %s?',
                        $page['Page']['title'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>