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
        <div class="entry">
            <h1>SEO Settings</h1>
            <?php
            echo $this->Form->input('meta_title', array('label' => __('Title')));
            echo $this->Form->input('meta_description', array('label' => __('Description')));
            echo $this->Form->input('meta_keywords', array('label' => __('Keywords')));
            ?>
        </div><!-- END .entry-->
    </div><!-- END .span9 -->
    <div class="span3">
        <div class="entry">

            <div class="widget">
                <?php
                $newTagLink = $this->Html->link(__('New Tag'), array('controller' => 'blog_post_tags', 'action' => 'add'));
                echo $this->Form->input('BlogPostTag', array('label' => __('Tags - ') . $newTagLink));
                ?>
            </div><!-- END .widget -->
            <div class="widget">
                <?php
                $newCategoryLink = $this->Html->link(__('New Category'), array('controller' => 'blog_post_categories', 'action' => 'add'));
                echo $this->Form->input('BlogPostCategory', array('label' => __('Categories - ') . $newCategoryLink));
                ?>
            </div><!-- END .widget -->
            <div class="widget">
                <?php
                echo $this->Form->input('published', array('label' => __('Publish?')));
                //                echo $this->Form->input('sticky', array('label' => __('Stick to top of page?')));
                echo $this->Form->input('in_rss', array('disabled' => 'disabled', 'checked' => 'checked', 'class' => 'hidden', 'label' => false));
                echo $this->Form->end(__('Submit'));
                ?>
            </div><!-- END .widget -->
            <div class="widget">
                <ul>
                    <!--                    <li>--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BlogPost.id')), array('class' => 'button delete'), __('Are you sure you want to delete # %s?', $this->Form->value('BlogPost.id'))); ?><!--</li>-->
                    <li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index'));?></li>
                    <li><?php echo $this->Html->link(__('List Blog Post Categories'), array('controller' => 'blog_post_categories', 'action' => 'index')); ?> </li>
<!--                    <li>--><?php //echo $this->Html->link(__('New Blog Post Category'), array('controller' => 'blog_post_categories', 'action' => 'add')); ?><!-- </li>-->
                    <li><?php echo $this->Html->link(__('List Blog Post Tags'), array('controller' => 'blog_post_tags', 'action' => 'index')); ?> </li>
<!--                    <li>--><?php //echo $this->Html->link(__('New Blog Post Tag'), array('controller' => 'blog_post_tags', 'action' => 'add')); ?><!-- </li>-->
                </ul>
            </div><!-- END .widget-->
        </div><!-- END .entry -->
    </div><!-- END .span3 -->
</div><!-- END .row -->