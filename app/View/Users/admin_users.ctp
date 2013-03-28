<div class='entry'>
    <table>
        <thead></thead>
        <tr>
<!--            <th>Username</th>-->
            <th>Email</th>
            <th>Activated</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['User']['email']; ?></td>
                <td><?php echo $user['User']['activated']; ?></td>
                <td>
                    <?php echo $this->Html->link('',
                        array(
                            'action' => 'edit',
                            $user['User']['id']),
                        array(
                            'escape' => false,
                            'class' => 'actions',
                            'data-icon' => '&#xF139;')); ?>
                </td>
                <td>
                    <?php echo $this->Form->postLink('',
                        array(
                            'action' => 'delete',
                            $user['User']['id']),
                        array(
                            'class' => 'actions',
                            'escape' => false,
                            'data-icon' => '&#xF155;'),
                        __('Are you sure you want to delete %s?',
                            $user['User']['email'])); ?>

                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
        </tbody>
    </table>
</div><!-- END .entry-->