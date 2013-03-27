<div class="row">
    <?php
    echo $this->Form->create('BlogPost', array('inputDefaults' => array('div' => false)));

    ?>
    <div class="span9">
        <div class="entry">
            <?php
            echo $this->Form->input('title');
            echo $this->Form->input('body', array('class' => 'redactor'));
            echo $this->Form->input('summary', array('class' => 'redactor'));
            ?>
        </div><!-- END .entry -->
    </div><!-- END .span9 -->
    <div class="span3">
        <div class="entry">
            <div class="widget">
                <?php
                echo $this->Form->input('published', array('label' => 'Publish?'));
                echo $this->Form->input('sticky', array('label' => 'Stick to top of page?'));
                echo $this->Form->input('in_rss', array('disabled' => 'disabled', 'checked' => 'checked', 'class' => 'hidden', 'label' => false));
                ?>
            </div><!-- END .widget -->
            <div class="widget">
                <?php
                echo $this->Form->input('BlogPostTag', array('label' => 'Tags'));
                ?>
            </div><!-- END .widget -->
            <div class="widget">
                <?php
                echo $this->Form->input('BlogPostCategory', array('label' => 'Categories'));
                echo $this->Form->end(__('Submit'));
//                echo $this->Form->postButton(__('Delete'), array('action' => 'delete', $this->Form->value('BlogPost.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BlogPost.id')));
                ?>
            </div><!-- END .widget -->
            <div class="widget">
                <ul>
                    <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BlogPost.id')), array('class' => 'button delete'), __('Are you sure you want to delete # %s?', $this->Form->value('BlogPost.id'))); ?></li>
                    <li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index'));?></li>
                    <li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('New Blog Post Category'), array('controller' => 'blog_post_categories', 'action' => 'add')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Blog Post Tags'), array('controller' => 'blog_post_tags', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('New Blog Post Tag'), array('controller' => 'blog_post_tags', 'action' => 'add')); ?> </li>
                </ul>
            </div><!-- END .widget-->
        </div><!-- END .entry -->
    </div><!-- END .span3 -->
</div><!-- END .row -->