<h1>Add Page</h1>
<?php
    echo $this->Form->create('Page');
    echo $this->Form->input('Page.title', array('required' => 'required'));
    echo $this->Form->input('Page.body', array('type' => 'textarea', 'class' => 'redactor', 'required' => 'required'));
    echo $this->Form->input('Category.name');
    echo $this->Form->input('Page.permalink');
    echo $this->Form->input('Page.in_header');
    echo $this->Form->end('Save Page');
?>