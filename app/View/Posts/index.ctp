<?php foreach ($posts as $post): ?>
    <div class="entry">
        <div class="content article">
            <?php if(!empty($post['Post']['cover_photo'])): ?>
                <div class="media">
                    <?php echo $this->Html->link(
                        $this->Html->image('cover_photo/' . $post['Post']['cover_photo'], array(
                            'fullbase'  => true,
                            'alt'       => $post['Post']['alt_text'],
                        )),
                        array(
                            'action' => 'view',
                            $post['Post']['id'],
                        ),
                        array(
                            'escape'    => false,
                        ));
                    ?>
                </div><!-- END .media -->
            <?php endif; ?>
            <div class="meta">
                <header>
                    <?php echo $post['User']['Profile']['firstname'] . ' ' . $post['User']['Profile']['lastname'] . ' on ' . $post['Post']['created']; ?>
                    <?php
                        // I know that $user shoudn't be used here, but i've used it for styling.
                        echo $this->Html->link(
                            $this->Html->image('profile_pics/' . $post['User']['Profile']['picture'], array(
                               'fullbase'  => true,
                               'alt'       => $post['User']['Profile']['firstname'] . ' ' . $post['User']['Profile']['lastname'] . '\'s profile picture',
                           )),
                       '/profile/'.$post['User']['Profile']['id'],
                       array(
                           'escape'    => false,
                           'class'     => 'author'
                       ));
                    ?>
                    <h1><?php echo $this->Html->Link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?></h1>
                </header>
            </div><!-- END .meta -->
            <article>
                <?php //TODO: make logic to output first paragraph of body from post, for now using whole body
                    echo $post['Post']['body'];
                    echo $this->Html->Link(__('Read More'), array('action' => 'view', $post['Post']['id']));
                ?>
            </article>
        </div><!-- END .content -->
    </div><!-- END .entry -->
<?php endforeach; ?>