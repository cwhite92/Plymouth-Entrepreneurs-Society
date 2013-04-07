<div class="entry">
    <h2>Edit sponsor</h2>
    <?php echo $this->Form->create('Sponsor', array('type' => 'file')); ?>
    <?php echo $this->Form->hidden('id'); ?>
    <?php echo $this->Form->input('name'); ?>
    <?php echo $this->Form->input('picture', array('type' => 'file')); ?>
    <?php echo $this->Form->end('Save changes'); ?>
</div><!-- END .entry-->