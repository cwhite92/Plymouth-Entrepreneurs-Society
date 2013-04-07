<div class="entry">
    <div class="content article">
        <?php foreach ($contacts as $contact): ?>
            <header>
                <h1><?php echo $contact['Contact']['title']; ?></h1>
            </header>
            <?php echo $contact['Contact']['body']; ?>
        <?php endforeach; ?>
    </div><!-- END .content -->
</div><!-- END .entry -->