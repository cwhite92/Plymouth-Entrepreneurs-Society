<div class="entry">
    <div class="content events clearfix">
        <?php 
        if(!empty($event['Event']['picture'])): ?>
        <?php echo $this->Html->image('posters/' . $event['Event']['picture'], array(
                'fullbase'  => true,
                'alt'       => 'Poster for ' . $event['Event']['title'],
                'class'     => 'poster'
            ));
        endif;
        ?>
        <header>
            <strong><?php echo $event['Event']['location']; ?></strong>
            <h1><?php echo $event['Event']['title']; ?></h1>
        </header>
        <article>
            <?php //TODO: make logic to output first paragraph of body from post, for now using whole body
            echo $event['Event']['body'];
            ?>
        </article>
    </div><!-- END .content -->
</div><!-- END .entry -->
<div class="entry">
    <div class="content">
        subscribe form
    </div><!-- END .content -->
</div><!-- END .entry -->