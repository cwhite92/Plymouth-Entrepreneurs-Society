<div class="entry">
    <div class="content article">
        <div class="meta">
            <?php foreach ($contacts as $contact): ?>
                <?php echo $contact['Contact']['body']; ?>
            <?php endforeach; ?>
        </div><!-- END .meta -->
    </div><!-- END .content -->
</div><!-- END .entry -->