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
<!--
    Plymouth Entrepreneurs Society
    Designed by:    BBB, Eduards Torba
    Coded by:       BBB, Eduards Torba, Chris White, Jake Champion, Levi Lucas
    Version:        1.0
-->
<head>
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php echo $this->Html->meta('icon'); ?>

    <!-- STYLESHEET -->
    <?php echo $this->Html->css(array('style')); ?>

    <!-- SCRIPTS -->
    <?php echo $this->Html->script(array('moderniz.min.js', 'jquery', 'fitvids.min', 'twitter', 'main')); ?>
    <!--[if lt IE 9]> <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lte IE 9]> <?php echo $this->Html->script(array('jquery.placeholder.min.js')); ?>
    <script>$(document).ready(function(){ $('input, textarea').placeholder(); });
    </script><![endif]-->

    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
</head>
<body>
<?php echo $this->Session->flash(); ?>
<?php if($authed) $this->requestAction('/Users/online', array('pass' => array($user['User']['id']))); ?>
<div class="mainContainer">
    <div class="section clearfix">
        <ul class="nav">
            <li class="mobileTrigger hiddenDesktop"><a href="#" data-icon="&#xF0AA;"></a></li>
            <li class="currentMenuItem"><?php echo $this->Html->link('News', '/', array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('Events', '/events', array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('Members', array('controller' => 'users', 'action' => 'memberList'), array('escape' => false)); ?></li>
            <li>
                <a href="#">Services+</a>
                <ul>
                    <li><a href="#">Mentoring</a></li>
                    <li><a href="#">University Start-Up Support</a></li>
                    <li><a href="#">Funding</a></li>
                </ul>
            </li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div><!-- END .section -->
    <div class="section clearfix">
        <div class="aside upper">
            <div class="entry logo">
                <?php
                echo $this->Html->link(
                    $this->Html->image('logo.png', array('alt' => $cakeDescription, 'border' => '0')),
                    '/',
                    array('escape' => false)
                );
                ?>
            </div><!-- END .entry -->
            <?php if(!$authed): ?>
                <?php echo $this->element('login'); ?>
            <?php else: ?>
                <?php echo $this->element('dashboard'); ?>
            <?php endif; ?>
        </div><!-- END .aside -->
        <div class="primary">
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('sql_dump'); ?>
        </div><!-- END .primary -->
        <div class="aside lower">
            <div class="entry widget">
                <div class="content">
                    <h1>Upcoming events</h1>
                    <ul class="recent clearfix">
                        <?php foreach($latestEvents as $event): ?>
                            <li><?php echo $this->Html->link(
                                    $this->Html->image('posters/' . $event['Event']['picture'], array(
                                        'fullbase'  => true,
                                        'alt'       => 'Poster for ' . $event['Event']['title']
                                    )),
                                    array('controller' => 'events', 'action' => 'view', $event['Event']['id']),
                                    array('escape' => false, 'class' => 'pic')
                                );

                                echo $this->Html->link($event['Event']['title'],
                                    '/event/'.$event['Event']['id'], array('escape' => false)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- END .content -->
            </div><!-- END .entry -->
            <div class="entry widget">
                <div class="content">
                    <h1>Recent members</h1>
                    <ul class="recent clearfix">
                        <?php foreach($latestUsers as $user): ?>
                            <li><?php echo $this->Html->link(
                                    $this->Html->image('profile_pics/' . $user['Profile']['picture'], array(
                                        'fullbase'  => true,
                                        'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname']
                                    )),
                                    '/profile/'.$user['Profile']['id'],
                                    array('escape' => false, 'class' => 'pic')
                                );

                                echo $this->Html->link($user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'],
                                '/profile/'.$user['Profile']['id'], array('escape' => false)); ?>
                                <?php
                                $skills = '';

                                foreach($user['Skill'] as $skill):
                                    $skills .= $skill['name'].', ';
                                endforeach;
                                $skills = substr_replace($skills , '', -2);

                                echo '<span class="skills">'.preview($skills, 30).'</span>';
                                ?>
                            </li>
                        <?php endforeach; ?>
                        <?php
                        function preview($_text, $_count) {
                            $_count2 = $_count;
                            $_text = strip_tags($_text);
                            
                            if (strlen ($_text) > $_count) {
                                while ($_text[$_count] != " " && $_count < strlen ($_text) - 1) {
                                    $_count++;
                                    if ($_count - $_count2 == 12) {
                                        return substr ($_text, 0, $_count)."...";
                                    }
                                }
                                return substr ($_text, 0, $_count)."...";
                            } else {
                                return $_text;
                            }
                        }
                        ?>
                    </ul>
                </div><!-- END .content -->
            </div><!-- END .entry -->
            <div class="entry widget">
                <div class="content">
                    <h1>Twitter Feed</h1>
                    <ul class="tweetbox"></ul>
                </div><!-- END .content -->
            </div><!-- END .entry -->
        </div><!-- END .aside -->
    </div><!-- END .section -->
    <div class="section clearfix">
        <div class="entry">
            <footer>
                footer
            </footer>
        </div><!-- END .entry -->
        <div class="entry">
            &copy; <?php print date( 'Y' ); ?>. All rights reserved.
        </div><!-- END .entry -->
    </div><!-- END .section -->
</div><!-- END .mainContainer -->
<a class="scrollUpButton" href="#" data-icon="&#xF018;"></a>
</body>
</html>