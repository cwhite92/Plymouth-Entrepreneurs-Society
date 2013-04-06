<?php foreach ($events as $event): ?>
    <div class="entry">
        <?php if(!empty($event['Event']['picture'])) { ?>
            <div class="media">
                <?php echo $this->Html->link(
                    $this->Html->image('posters/' . $event['Event']['picture'], array(
                        'fullbase'  => true,
                        'alt'       => 'Poster for ' . $event['Post']['title'],
                    )),
                    array(
                        'action' => 'view',
                        $event['Event']['id'],
                    ),
                    array(
                        'escape'    => false,
                    ));
                ?>
            </div><!-- END .media -->
        <?php }?>
        <div class="content">
            <header>
                <strong>
                    <?php echo $event['Event']['location']; ?>
                </strong>
                <h1>
                    <?php echo $this->Html->Link($event['Event']['title'], array('action' => 'view', $event['Event']['id'])); ?>
                </h1>
            </header>
            <article>
                <?php //TODO: make logic to output first paragraph of body from post, for now using whole body
                echo $event['Event']['body'];
                echo $this->Html->Link(__('Read More'), array('action' => 'view', $event['Event']['id']));
                ?>
            </article>
        </div><!-- END .content -->
    </div>

<?php endforeach; ?>