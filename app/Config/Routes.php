<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes admin
$routes->get('/', 'Main::dashboard');

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
$routes->post('/save_karir', 'Karir::save_karir');
$routes->get('/edit_karir/(:num)', 'Karir::edit_karir/$1');
$routes->post('/karir/update/(:num)', 'Karir::update_karir/$1');
$routes->get('/delete_karir/(:num)', 'Karir::delete_karir/$1');

$routes->get('/konten', 'Konten::index');
$routes->get('/create_konten', 'Konten::create_konten');
$routes->post('/save_konten', 'Konten::save_konten');
$routes->get('/edit_konten/(:num)', 'Konten::edit_konten/$1');
$routes->post('konten/update/(:num)', 'Konten::update_konten/$1');
$routes->get('delete_konten/(:num)', 'Konten::delete_konten/$1');


// Routes dinamis untuk semua submenu "Tentang"
// $routes->get('/tentang/(:segment)', 'PageController::index/$1');

// Routes statis menu "Tentang" untuk kompatibilitas jika diperlukan
$routes->get('/sejarah', 'Tentang::sejarah');
$routes->get('/visiMisi', 'Tentang::visiMisi');
$routes->get('/tujuanFungsi', 'Tentang::tujuanFungsi');
$routes->get('/pancaPrasetya', 'Tentang::view/pancaPrasetya');
$routes->get('/programUtama', 'Tentang::programUtama');

// Routes dinamis untuk semua submenu "Media"
$routes->get('/media/(:segment)', 'Media::index/$1');
