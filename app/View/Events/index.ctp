<?php foreach ($events as $event): ?>
    <div class="entry">
        <div class="content">
            <?php if(!empty($event['Event']['picture'])) { ?>
                <div class="media">
                    <?php echo $this->Html->link(
                        $this->Html->image('posters/' . $event['Event']['picture'], array(
                            'fullbase'  => true,
                            'alt'       => 'Poster for ' . $event['Event']['title'],
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
                ?>
            </article>
        </div><!-- END .content -->
    </div>

<?php endforeach; ?>