<div class="entry article">
    <div class="content">
        <?php if(!empty($post['Post']['cover_photo'])): ?>
            <div class="media">
                <?php echo $this->Html->image('cover_photo/' . $post['Post']['cover_photo'], array(
                        'fullbase'  => true,
                        'alt'       => $post['Post']['alt_text'],
                    ));
                ?>
            </div><!-- END .media -->
        <?php endif; ?>
        <div class="meta">
            <header>
                <?php echo $post['User']['Profile']['firstname'] . ' ' . $post['User']['Profile']['lastname'];?> on <?php echo $this->Time->format('d M Y', $post['Post']['created']); ?>
                <?php
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
                <h1><?php echo $post['Post']['title']; ?></h1>
            </header>
        </div><!-- END .meta -->
        <article>
            <?php //TODO: make logic to output first paragraph of body from post, for now using whole body
                echo $post['Post']['body'];
            ?>
        </article>
    </div><!-- END .content -->
</div><!-- END .entry -->
<?php
if(isset($user)) {
if($user['User']['admin'] == 1) {
?>
<div class="entry">
    <div class='content'>
    <?php
        echo $this->Html->link(' EDIT',
            array(
                'action' => 'edit',
                $post['Post']['id'],
                'admin' => true),
            array(
                'escape' => false,
                'class' => 'actions edit',
                'data-icon' => '&#xF139;'));

        echo $this->Form->postLink('DELETE',
            array(
                'action' => 'delete',
                $post['Post']['id'],
                'admin' => true),
            array(
                'class' => 'actions delete',
                'escape' => false,
                'data-icon' => '&#xF155;'),
            __('Are you sure you want to delete this post?'));
    ?>
    </div><!-- END .content -->"
    <?php
        }
    }
    ?>
</div><!-- END .entry -->
