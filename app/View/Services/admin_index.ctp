<h1 class="alignLeft">Services</h1>
<?php echo $this->Html->link('Add a Page', array('action' => 'add')); //TODO: put space between title and link?>
<table>
    <tr>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($services as $service): ?>
        <tr>
            <td><?php echo $service['Service']['title']; ?></td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $service['Service']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions',
                        'data-icon' => '&#xF139;')); ?>
            </td>
            <td>
                <?php echo $this->Form->postLink('',
                    array(
                        'action' => 'delete',
                        $service['Service']['id']),
                    array(
                        'class' => 'actions',
                        'escape' => false,
                        'data-icon' => '&#xF155;'),
                    __('Are you sure you want to delete %s?',
                        $service['Service']['title'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>