<div class="entry">
    <div class="content events clearfix">
        <?php 
        if(!empty($event['Event']['poster'])): ?>
        <?php echo $this->Html->image('posters/' . $event['Event']['poster'], array(
                'fullbase'  => true,
                'alt'       => 'Poster for ' . $event['Event']['title'],
                'class'     => 'poster'
            ));
        endif;
        ?>
        <header>
            <strong><?php echo $event['Event']['location']; ?></strong>
            <?php echo $this->Time->format('d M Y H:i', $event['Event']['date']); ?>
            <h1><?php echo $event['Event']['title']; ?></h1>
        </header>
        <article>
            <?php
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