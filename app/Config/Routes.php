<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/register', 'Register::index');
$routes->post('/register/action', 'Register::registerAction');

$routes->get('/login', 'Login::index');
$routes->post('/login/action', 'Login::loginAction');
$routes->get('/logout', 'Login::logout');

$routes->get('/admin', 'Home::admin');

$routes->get('/konten', 'Home::konten');

$routes->get('/pages', 'Home::pages');

$routes->get('/karir', 'Home::karir');

$routes->get('/create_konten', 'Home::create_konten');
$routes->post('/create_konten', 'Home::save_konten');

$routes->get('/create_pages', 'Home::create_pages');

$routes->get('/create_karir', 'Home::create_karir');