<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// https://www.codeigniter.com/user_guide/incoming/routing.html
//     method  path  controller   alias
$routes->get('/dummy', 'Dummy::index');

$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->add('/signup', 'Auth\Auth::signup', ['as' => 'signup']);

$routes->add('/login', 'Auth\Auth::login', ['as' => 'login']);

$routes->get('/logout', 'Auth\Auth::logout', ['as' => 'logout']);

$routes->get('/profile', 'Auth\UserProfile::index', ['as' => 'userProfile', 'filter' => 'auth']);

$routes->add('/profile/edit', 'Auth\UserProfile::edit', ['as' => 'userProfileEdit', 'filter' => 'auth']);

$routes->get('/messages', 'Auth\Message::index', ['as' => 'message', 'filter' => 'auth']);
$routes->get('/messages/send', 'Auth\Message::send', ['filter' => 'ajax']);
$routes->get('/messages/inbox/(:num)', 'Auth\Message::inbox/$1');
$routes->get('/messages/conversation/(:num)/(:num)', 'Auth\Message::conversation/$1/$2', ['filter' => 'ajax']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
