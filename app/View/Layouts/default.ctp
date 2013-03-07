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
	<?php echo $this->Html->css(array('style')); ?>

	<!-- SCRIPTS -->
	<?php echo $this->Html->script(array('jquery', 'fitvids.min', 'twitter', 'functions')); ?>
	<!--[if lt IE 9]> <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lte IE 9]> <script src="js/jquery.placeholder.min.js"></script> <script>$(document).ready(function(){ $('input, textarea').placeholder(); });</script><![endif]-->

	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->fetch('css'); ?>
	<?php echo $this->fetch('script'); ?>
</head>
<body>
	<div class="mainContainer"><!-- BEGIN .mainContainer -->
		<div class="headerContainer clearfix"><!-- BEGIN .headerContainer -->
            <div class="contentContainer"><!-- BEGIN .contentContainer -->
                <!-- BEGIN .row -->
                <div class="row">
                    <div class="span12">
                        <div class="nav">
                            <nav>
                                <ul class="mainMenu visibleDesktop">
                                    <li class="currentMenuItem"><?php echo $this->Html->link('Home', '/', array('escape' => false)); ?></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Members</a></li>
                                    <li>
                                        <a href="#">Services +</a>
                                        <ul>
                                            <li><a href="#">Mentoring</a></li>
                                            <li><a href="#">University Start-Up Support</a></li>
                                            <li><a href="#">Funding</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <?php if($authed): // Will be removed later ?>
                                    <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <div class="hiddenDesktop">
                                    <a class="mobileMenuBtn" href="#">Mobile Menu</a>
                                    <ul class="mobileMenu"></ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END .row -->
            <div class="cfix"></div>
            </div><!-- END .contentContainer -->
        </div><!-- END .headerContainer -->
        <div class="middleContainer"><!-- BEGIN .middleContainer -->
            <div class="contentContainer"><!-- BEGIN .contentContainer -->
                <!-- BEGIN .row -->
                <div class="row">
                    <div class="span8"><!-- BEGIN .span8 -->
                        <span class="logo visiblePhone">
							<?php echo $this->Html->link(
									$this->Html->image('logo.png', array('alt' => $cakeDescription, 'border' => '0')),
									'/',
									array('escape' => false)
								);
							?>
                        </span>
                        <div class="dashboardMobile dashboard visiblePhone"></div>
                        <div>
                        	<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
                        </div>
                    </div><!-- END .span8 -->
                    <div class="span4"><!-- BEGIN .span4 -->
                        <div class="aside"><!-- BEGIN .aside -->
                            <div class="widget logo hiddenPhone">
                                <?php echo $this->Html->link(
									$this->Html->image('logo.png', array('alt' => $cakeDescription, 'border' => '0')),
									'/',
									array('escape' => false)
								);
							?>
                            </div>
                            <div class="widget hiddenPhone dashboard dashboardMain">
                                <fieldset>
                                    <div class="fieldWrap">
                                        <input type="text" name="email" tabindex="1" placeholder="Email" />
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="fieldWrap">
                                        <input type="password" name="password" tabindex="2" placeholder="Password" autocomplete="off" />
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="buttons">
                                        <input class="button" type="submit" name="submit" value="Sign In" /> <a href="#">Lost Password?</a> <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?>
                                    </div>
                                </fieldset>
                            </div>
                            <?php echo $this->element('sidebar'); ?>
                        </div>
                    </div><!-- END .span4 -->
                </div>
                <!-- END .row -->
                <div class="cfix"></div>
            </div><!-- END .contentContainer -->
        </div><!-- END .middleContainer -->
        <div class="footerContainer"><!-- BEGIN .footerContainer -->
            <div class="contentContainer"><!-- BEGIN .contentContainer -->
            	<?php echo $this->element('sponsors'); ?>
                <!-- BEGIN .row -->
                <div class="row">
                    <div class="span7 copyright">
                        <footer>
                            <p>© 2013 BBB. All Rights Reserved.</p>
                            Designed and Coded by Eduards Torba, Chris White, Levi Lucas, Jake Champion, Louis Harrison.
                        </footer>
                    </div>
                    <div class="span5 copyright links">
                        <footer>
                            <a href="#">Terms</a> &#8226; <a href="#">Data Use Policy</a> &#8226; <a href="#">Cookies</a>
                        </footer>
                    </div>
                </div>
                <!-- END .row -->
                <div class="row">
                	<div class="span12">
                		<?php echo $this->element('sql_dump'); ?>
                	</div>
                </div>
                <div class="cfix"></div>
            </div><!-- END .contentContainer -->
        </div><!-- END .footerContainer -->
	<div class="cfix"></div>
    </div><!-- END .mainContainer -->
    <a class="scrollUpBtn" href="#">Scroll Up</a>
</body>
</html>
