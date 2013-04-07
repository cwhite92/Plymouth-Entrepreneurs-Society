<div class="entry">
    <div class="content article">
        <div class="meta">
            <?php foreach ($contacts as $contact): ?>
                <header>
                    <h1><?php echo $contact['Contact']['title']; ?></h1>
                </header>
                <?php echo $contact['Contact']['body']; ?>
            <?php endforeach; ?>
        </div><!-- END .meta -->
    </div><!-- END .content -->
</div><!-- END .entry -->