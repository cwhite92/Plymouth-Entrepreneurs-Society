<div class="entry">
    <div class="content events clearfix">
        <?php 
        if(!empty($event['Event']['poster'])):
            echo $this->Html->image('posters/' . $event['Event']['poster'], array(
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