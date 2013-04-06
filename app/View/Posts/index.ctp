<?php foreach ($posts as $post): ?>
    <div class="article">
        <?php if(!empty($post['Post']['cover_photo'])) { ?>
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
        <?php }?>
        <div class="content">
                <header>
                    <strong>
                        <?php //TODO: change user_id to author's name ?>
                        <?php echo $post['Post']['user_id'] . ' on ' . $post['Post']['created']; ?>
                        <span class="avatar">
                            <?php //TODO: add authors picture instead of logged in user
                            //TODO: add css to make authors avatar a circle
//                            echo $this->Html->link(
//                                $this->Html->image('profile_pics/' . $user['Profile']['picture'], array(
//                                    'fullbase'  => true,
//                                    'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'] . '\'s profile picture',
//                                )),
//                                '/profile/'.$user['Profile']['id'],
//                                array(
//                                    'escape'    => false,
//                                ));
                            ?>
                        </span>
                    </strong>
                    <h1>
                        <?php echo $this->Html->Link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
                    </h1>
                </header>
                <article>
                    <?php //TODO: make logic to output first paragraph of body from post, for now using whole body
                        echo $post['Post']['body'];
                        echo $this->Html->Link(__('Read More'), array('action' => 'view', $post['Post']['id']));
                    ?>
                </article>
            </div><!-- END .content -->
    </div>

<?php endforeach; ?>