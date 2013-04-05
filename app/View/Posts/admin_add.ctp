<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->textarea('body', array('class' => 'redactor'));
echo $this->Form->end('Save Post');
?>