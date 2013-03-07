<div>
    <div class="whiteBox"><!-- BEGIN .whiteBox -->
        <div class="content"><!-- BEGIN .content -->
            <h2>Login</h2>

            <?php echo $this->Session->flash('auth'); ?>

            <?php echo $this->Form->create('User'); ?>
            <?php echo $this->Form->input('email'); ?>
            <?php echo $this->Form->input('password'); ?>
            <?php echo $this->Form->end('Login'); ?>
        </div><!-- END .content -->
    </div><!-- END .whiteBox -->
</div>