<div class="entry">
    <div class="content article">
        <div class="meta">
            <?php foreach ($abouts as $about): ?>
                <header>
                <h1><?php echo $about['About']['title']; ?></h1>
            </header>
                <?php echo $about['About']['body']; ?>
            <?php endforeach; ?>
        </div><!-- END .meta -->
    </div><!-- END .content -->
</div><!-- END .entry -->