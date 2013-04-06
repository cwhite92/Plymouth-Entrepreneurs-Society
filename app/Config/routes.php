<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

    // General routes
    Router::connect('/', array('controller' => 'posts', 'action' => 'index'));
    Router::connect('/events', array('controller' => 'events', 'action' => 'index'));

    // Admin routes
    Router::connect('/admin', array('controller' => 'users', 'action' => 'home', 'admin' => true));
    Router::connect('/admin/users', array('controller' => 'users', 'action' => 'index', 'admin' => true));
    Router::connect('/admin/news', array('controller' => 'posts', 'action' => 'index', 'admin' => true));
    Router::connect('/admin/events', array('controller' => 'events', 'action' => 'index', 'admin' => true));

    // User specific routes
    Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
    Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
    Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
    Router::connect('/activate/*', array('controller' => 'users', 'action' => 'activate'));
    Router::connect('/account/edit', array('controller' => 'users', 'action' => 'edit'));
    Router::connect('/members', array('controller' => 'users', 'action' => 'memberList'));

    // Skill specific routes
    Router::connect('/skills', array('controller' => 'skills', 'action' => 'index'));
    Router::connect('/skill/*', array('controller' => 'skills', 'action' => 'view'));

    // Service specific routes
    Router::connect('/services', array('controller' => 'services', 'action' => 'index'));

    // Profile specific routes
    Router::connect('/profile/edit', array('controller' => 'profiles', 'action' => 'edit'));
    Router::connect('/profile/edit/deleteProfilePicture', array('controller' => 'profiles', 'action' => 'deleteProfilePicture'));
    Router::connect('/profile/*', array('controller' => 'profiles', 'action' => 'view'));

    // Event specific routes
    Router::connect('/event/*', array('controller' => 'events', 'action' => 'view'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
    CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
    require CAKE . 'Config' . DS . 'routes.php';