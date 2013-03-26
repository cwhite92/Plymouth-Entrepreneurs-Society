<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Entrepreneurs Society');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!-- Designed and Coded by Eduards Torba, Chris White, Levi Lucas, Jake Champion, Louis Harrison. -->
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php echo $this->Html->meta('icon'); ?>

    <!-- STYLESHEET -->
    <?php echo $this->Html->css(array('style.admin')); ?>

    <!-- SCRIPTS -->
    <?php echo $this->Html->script(array('jquery', 'fitvids.min', 'twitter', 'functions')); ?>
    <!--[if lt IE 9]> <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
</head>
<body>
<div class="bar">
    <ul>
        <li class="currentMenuItem"><a href=""><span data-icon="&#xF162;"></span><span class="text">Home</span></a></li>
        <li><a href="news.html"><span data-icon="&#xF139;"></span><span class="text">News</span></a></li>
        <li><a href="events.html"><span data-icon="&#xF05B;"></span><span class="text">Events</span></a></li>
        <li><a href="users.html"><span data-icon="&#xF0CD;"></span><span class="text">Users</span></a></li>
        <li><a href="#"><span data-icon="&#xF0CE;"></span><span class="text">Mass Mail</span></a></li>
        <li><a href="#"><span data-icon="&#xF04E;"></span><span class="text">Settings</span></a></li>
    </ul>
</div><!-- END .bar -->

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

</body>
</html>