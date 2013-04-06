<div class="entry">
    <div class="content article">
        <div class="meta">
            <ul>
                <?php foreach ($services as $service): ?>
                    <li>
                        <?php echo $this->Html->Link($service['Service']['title'], array('action' => 'view', $service['Service']['id'])); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!-- END .meta -->
    </div><!-- END .content -->
</div><!-- END .entry -->