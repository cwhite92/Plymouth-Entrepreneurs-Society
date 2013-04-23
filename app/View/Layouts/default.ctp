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
        <?php echo $pageTitle; ?>
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
        <nav>
            <ul class="nav">
                <li class="mobileTrigger hiddenDesktop"><a href="#" data-icon="&#xF0AA;"></a></li>
                <li <?php if (isset($currentPage) && $currentPage == 'news') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('News', '/', array('escape' => false)); ?>
                </li>
                <li <?php if (isset($currentPage) && $currentPage == 'events') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('Events', '/events', array('escape' => false)); ?>
                </li>
                <li <?php if (isset($currentPage) && $currentPage == 'members') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('Members', array('controller' => 'users', 'action' => 'memberList'), array('escape' => false)); ?>
                </li>
                <li <?php if (isset($currentPage) && $currentPage == 'services' || isset($currentPageParent) && $currentPageParent == 'services') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('Services+', '#'); ?>
                    <ul class="subMenu">
                        <?php foreach ($services as $service): ?>
                            <li <?php if (isset($currentPage) && $currentPage == $service['Service']['title']) echo 'class="currentMenuItem"' ?> >
                                <?php echo $this->Html->Link($service['Service']['title'], array('controller' => 'services', 'action' => 'view', $service['Service']['permalink'])); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li <?php if (isset($currentPage) && $currentPage == 'skills') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('Skills', array('controller' => 'skills', 'action' => 'index'), array('escape' => false)); ?>
                </li>
                <li <?php if (isset($currentPage) && $currentPage == 'about') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('About Us', array('controller' => 'abouts', 'action' => 'index'), array('escape' => false)); ?>
                </li>
                <li <?php if (isset($currentPage) && $currentPage == 'contact') echo 'class="currentMenuItem"' ?> >
                    <?php echo $this->Html->link('Contact', array('controller' => 'contacts', 'action' => 'index'), array('escape' => false)); ?>
                </li>
            </ul>
        </nav>
    </div><!-- END .section -->
    <div class="section clearfix">
        <div class="aside upper">
            <div class="entry logo">
                <?php
                echo $this->Html->link(
                    $this->Html->image('logo.png', array('alt' => 'Plymouth Entrepreneurs Society')),
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
                                    $this->Html->image('posters/' . $event['Event']['poster'], array(
                                        'fullbase'  => true,
                                        'alt'       => 'Poster for ' . $event['Event']['title']
                                    )),
                                    array('controller' => 'events', 'action' => 'view', $event['Event']['id']),
                                    array('escape' => false, 'class' => 'pic')
                                );

                                echo $this->Html->link($event['Event']['title'],
                                    '/event/'.$event['Event']['id'], array('escape' => false));
                                echo  '<span class="date">'.$this->Time->format('d M Y', $event['Event']['date']).'</span>';
                                ?>
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
                                        'alt'       => $user['Profile']['firstname'] . ' ' . $user['Profile']['lastname']
                                    )),
                                    '/profile/'.$user['Profile']['id'],
                                    array('escape' => false, 'class' => 'pic')
                                );

                                echo $this->Html->link($user['Profile']['firstname'] . ' ' . $user['Profile']['lastname'],
                                '/profile/'.$user['Profile']['id'], array('escape' => false)); ?>
                                <span class="skills">
                                <?php
                                $i = 0;
                                foreach($user['Skill'] as $skill):
                                    if ( $i != 6 ):
                                        echo $this->Html->link($skill['name'], array(
                                            'controller'    => 'skills',
                                            'action'        => 'view',
                                            urlencode($skill['name'])
                                        ));
                                        $i++;
                                        if ( $i > 0 && $i != 5 && $i != count( $user['Skill'] ) ) echo ', ';
                                    endif;
                                endforeach;
                                ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
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
        <div class="entry sponsors">
            <footer>
                <?php foreach($sponsors as $sponsor): ?>
                    <?php echo $this->Html->image('sponsors/' . $sponsor['Sponsor']['picture'], array(
                        'alt'       => $sponsor['Sponsor']['name']
                    )); ?>
                <?php endforeach; ?>
            </footer>
        </div><!-- END .entry -->
        <div class="entry">
            &copy; <?php print date( 'Y' ); ?>. All rights reserved. <?php echo $this->Html->link('Terms of Services', '#urlGoesHere', array('class' => 'termsServices', 'escape' => false)); ?>
        </div><!-- END .entry -->
    </div><!-- END .section -->
</div><!-- END .mainContainer -->
<a class="scrollUpButton" href="#" data-icon="&#xF018;"></a>
</body>
</html>