<?php foreach ($events as $event): ?>
    <div class="entry">
        <div class="content events clearfix">
            <?php 
            if(!empty($event['Event']['poster'])): ?>
            <?php echo $this->Html->link(
                $this->Html->image('posters/' . $event['Event']['poster'], array(
                    'alt'       => 'Poster for ' . $event['Event']['title'],
                    'class'     => 'poster'
                )),
                array(
                    'action' => 'view',
                    $event['Event']['id'],
                ),
                array(
                    'escape'    => false,
                ));
            endif;
            ?>
            <header>
                <strong><?php echo $event['Event']['location']; ?></strong>
                <?php echo $this->Time->format('d M Y H:i', $event['Event']['date']); ?>
                <h1><?php echo $this->Html->Link($event['Event']['title'], array('action' => 'view', $event['Event']['id'])); ?></h1>
            </header>
            <article>
                <?php //TODO: make logic to output first paragraph of body from post, for now using whole body
                echo $event['Event']['body'];
                ?>
            </article>
        </div><!-- END .content -->
    </div><!-- END .entry -->
<?php endforeach; ?>
<?php echo $this->Paginator->numbers(array(
    'separator'     => '',
    'class'         => 'pageNumber',
    'before'        => '<div class="pageNumbers">',
    'after'         => '</div>'
)); ?>