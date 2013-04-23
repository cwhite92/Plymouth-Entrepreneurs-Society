<div class="entry">
    <div class="content events clearfix">
        <?php 
        if(!empty($event['Event']['poster'])):
            echo $this->Html->image('posters/' . $event['Event']['poster'], array(
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
        <?php if(count($event['Attachment']) > 0): ?>
            <h2>Attachments</h2>
            <ul id="attachments">
                <?php foreach($event['Attachment'] as $attachment): ?>
                    <li><?php echo $this->Html->link($attachment['filename'], '/files/attachments/' . $attachment['filename'], array('target' => '_blank')); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div><!-- END .content -->
</div><!-- END .entry -->
<?php
if(isset($user)) {
    if($user['User']['admin'] == 1) {
?>
<div class="entry">
    <div class='content'>
        <?php
        echo $this->Html->link('EDIT',
            array(
                'action' => 'edit',
                $event['Event']['id'],
                'admin' => true),
            array(
                'escape' => false,
                'class' => 'actions edit',
                'data-icon' => '&#xF139;'));

        echo $this->Form->postLink('DELETE',
            array(
                'action' => 'delete',
                $event['Event']['id'],
                'admin' => true),
            array(
                'class' => 'actions delete',
                'escape' => false,
                'data-icon' => '&#xF155;'),
            __('Are you sure you want to delete this event?'));
        ?>
    </div><!-- END .content -->"
    <?php
    }
}
    ?>
</div><!-- END .entry -->
