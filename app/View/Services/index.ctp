<div class="entry">
    <div class="content article">
        <ul>
            <?php foreach ($services as $service): ?>
                <li>
                    <?php echo $this->Html->Link($service['Service']['title'], array('action' => 'view', $service['Service']['id'])); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- END .content -->
</div><!-- END .entry -->