<div class='entry'>
    <table>
        <thead>
        <tr>
            <th>Email</th>
            <th>Activated</th>
            <th>Role</th>
            <th class="edit">Edit</th>
            <th class="delete">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['User']['email']; ?></td>
                <td><?php if( $user['User']['activated'] ) { echo 'Yes'; } else { echo 'No'; } ?></td>
                <td><?php if( $user['User']['admin'] ) { echo 'Admin'; } else { echo 'User'; } ?></td>
                <td>
                    <?php echo $this->Html->link('',
                        array(
                            'action' => 'edit',
                            $user['User']['id']),
                        array(
                            'escape' => false,
                            'class' => 'actions edit',
                            'data-icon' => '&#xF139;')); ?>
                </td>
                <td>
                    <?php echo $this->Form->postLink('',
                        array(
                            'action' => 'delete',
                            $user['User']['id']),
                        array(
                            'class' => 'actions delete',
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