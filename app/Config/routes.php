<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect(
		'/the-loai/:id-:slug.html/*',
		array('controller' => 'pages', 'action' => 'view_genre'),
		array(
			'pass' => array('id', 'slug'),
			"id" => "[0-9]+",
		)
	);

	Router::connect(
		'/chi-tiet/:slug-:id.html',
		array('controller' => 'pages', 'action' => 'detail_story'),
		array(
			'pass' => array('slug', 'id'),
			"id"=>"[0-9]+", // chỉ là số
		)
	);

	Router::connect(
		'/:slug1/:slug2-:id.html',
		array('controller' => 'pages', 'action' => 'detail_chap'),
		array(
			'pass' => array('slug1','slug2','id'),
			"id"=>"[0-9]+", // chỉ là số
		)
	);

	//Page admin
	Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
	//Router::connect('/list-user', array('controller' => 'users', 'action' => 'admin_list', 'method' => 'GET'));
	Router::connect('/add-user', array('controller' => 'users', 'action' => 'admin_add', 'method' => 'POST'));
	Router::connect('/edit-user/:id', ['controller' => 'users', 'action' => 'admin_edit', '[method]' => ['POST']], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/list-user', ['controller' => 'users', 'action' => 'admin_list', '[method]' => ['GET']], ['pass' => ['id'], 'id' => '[0-9]+']);

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
