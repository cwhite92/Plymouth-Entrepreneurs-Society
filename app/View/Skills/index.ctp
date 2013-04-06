    <div class="entry">
        <div class="content article">
            <div class="meta">
                <ul>
                    <?php foreach ($skills as $skill): ?>
                    <li>
                        <?php echo $this->Html->Link($skill['Skill']['name'], array('action' => 'view', $skill['Skill']['name'])); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- END .meta -->
        </div><!-- END .content -->
    </div><!-- END .entry -->