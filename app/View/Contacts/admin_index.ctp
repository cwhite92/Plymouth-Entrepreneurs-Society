<h1 class="alignLeft">Contact</h1>
<table>
    <tr>
        <th>Body</th>
        <th class="edit">Edit</th>
    </tr>
    <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?php echo $contact['Contact']['body']; ?></td>
            <td>
                <?php echo $this->Html->link('',
                    array(
                        'action' => 'edit',
                        $contact['Contact']['id']),
                    array(
                        'escape' => false,
                        'class' => 'actions edit',
                        'data-icon' => '&#xF139;')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>