<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/login', 'Home::login');
$routes->get('/admin', 'Home::admin');
$routes->get('/konten', 'Home::konten');
$routes->get('/pages', 'Home::pages');
$routes->get('/karir', 'Home::karir');
