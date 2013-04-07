<h1 class="alignLeft">About</h1>
<table>
    <tr>
        <th>Body</th>
        <th>Edit</th>
    </tr>
    <?php foreach ($abouts as $about): ?>
        <tr>
            <td><?php echo $about['About']['body']; ?></td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $about['About']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions',
                        'data-icon' => '&#xF139;')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>