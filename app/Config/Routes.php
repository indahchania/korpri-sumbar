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

$routes->get('/pages', 'Pages::index');
$routes->get('/create_pages', 'Pages::create_pages');
$routes->post('/create_pages', 'Pages::create_pages');

$routes->get('/karir', 'Karir::index');
$routes->get('/create_karir', 'Karir::create_karir');
$routes->post('/create_karir', 'Karir::save_karir');

$routes->get('/konten', 'Konten::index');
$routes->get('/create_konten', 'Konten::create_konten');
$routes->post('/save_konten', 'Konten::save_konten');