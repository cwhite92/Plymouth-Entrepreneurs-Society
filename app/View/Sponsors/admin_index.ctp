<div class='entry'>
    <p><?php echo $this->Html->link('Add Sponsor', array('action' => 'add')); ?></p>
    <table>
        <thead></thead>
        <tr>
            <th>Name</th>
            <th>Picture</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sponsors as $sponsor): ?>
            <tr>
                <td><?php echo $sponsor['Sponsor']['name']; ?></td>
                <td>
                    <?php echo $this->Html->image('sponsors/' . $sponsor['Sponsor']['picture'], array(
                        'fullbase'  => true,
                        'alt'       => $sponsor['Sponsor']['name'],
                        'height' => 50
                    )); ?>
                </td>
                <td>
                    <?php echo $this->Html->link('',
                        array(
                            'action' => 'edit',
                            $sponsor['Sponsor']['id']),
                        array(
                            'escape' => false,
                            'class' => 'actions',
                            'data-icon' => '&#xF139;')); ?>
                </td>
                <td>
                    <?php echo $this->Form->postLink('',
                        array(
                            'action' => 'delete',
                            $sponsor['Sponsor']['id']),
                        array(
                            'class' => 'actions',
                            'escape' => false,
                            'data-icon' => '&#xF155;'),
                        __('Are you sure you want to delete %s?',
                            $sponsor['Sponsor']['name'])); ?>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><!-- END .entry-->