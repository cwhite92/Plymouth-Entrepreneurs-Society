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
<?php if($authed) $this->requestAction('/Users/online', array('pass' => array($user['User']['id']))); ?>
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
    <?php echo $this->Html->css(array('style.admin', 'redactor')); ?>

    <!-- SCRIPTS -->
    <?php echo $this->Html->script(array('jquery', /*'main',*/ 'redactor.min', 'moderniz.min')); ?>
    <!--[if lt IE 9]> <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

</head>
<body>
<div class="bar">
    <ul>
        <li class="currentMenuItem">
            <?php echo $this->Html->link('<span data-icon="&#xF162;"></span><span class="text">Home</span>', '/', array('escape' => false)); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<span data-icon="&#xF139;"></span><span class="text">News</span>', '/admin/news', array('escape' => false)); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<span data-icon="&#xF05B;"></span><span class="text">Events</span>', '/admin/events', array('escape' => false)); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<span data-icon="&#xF0CD;"></span><span class="text">Users</span>', '/admin/users', array('escape' => false)); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<span data-icon="&#xF04E;"></span><span class="text">Services</span>', '/admin/services', array('escape' => false)); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<span data-icon="&#xF0CE;"></span><span class="text">Mass Mail</span>', 'https://login.mailchimp.com/', array('escape' => false, 'target' => '_blank')); ?>
        </li>
    </ul>
</div><!-- END .bar -->
<div class="mainContainer">
    <div class="contentContainer clearfix">
        <div class="section userMenu">
            <?php echo $this->Html->link('Entrepreneurs Society', '/', array('class' => 'logo')); ?>
            <?php
                echo $this->Html->link(
                        $this->Html->image('profile_pics/' . $user['Profile']['picture'], array(
                        'fullbase'  => true, 
                        'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'] . '\'s profile picture',
                        'class'     => 'profilePic'
                    )),
                    '/profile/'.$user['Profile']['id'],
                    array(
                        'escape'    => false,
                        'class'     => 'avatar'
                    ));
            ?>
            <?php
                echo $this->Html->link($user['Profile']['firstname'].' '. $user['Profile']['lastname'],
                    '/profile/'.$user['Profile']['id'],
                    array(
                        'escape'    => false,
                        'plugin'    => false
                    ));
            ?>
            <?php echo $this->Html->link('Sign out', array('admin' => false, 'controller' => 'users', 'action' => 'logout')); ?>
        </div><!-- END .section -->
        <div class="section clearfix">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
        </div><!-- END .section -->
    </div><!-- END .contentContainer -->
</div><!-- END .mainContainer -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.redactor').redactor();
    });
</script>
</body>
</html>