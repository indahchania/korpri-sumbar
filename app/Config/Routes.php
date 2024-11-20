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
$routes->post('/create_karir', 'Karir::save_karir');

$routes->get('/konten', 'Konten::index');
$routes->get('/create_konten', 'Konten::create_konten');
$routes->post('/save_konten', 'Konten::save_konten');
$routes->get('/edit_konten/(:num)', 'Konten::edit_konten/$1');
$routes->post('konten/update/(:num)', 'Konten::update_konten/$1');
$routes->get('delete_konten/(:num)', 'Konten::delete_konten/$1');


// // Routes dinamis untuk semua kategori "Tentang"
// $routes->get('korprisumbar/tentang/(:segment)', 'PageController::index/$1');

// // Routes statis lainnya untuk kompatibilitas jika diperlukan
// $routes->get('korprisumbar/tentang/sejarah', 'Tentang::view/sejarah');
// $routes->get('korprisumbar/tentang/visiMisi', 'Tentang::view/visiMisi');
// $routes->get('korprisumbar/tentang/tujuanFungsi', 'Tentang::view/tujuanFungsi');
// $routes->get('korprisumbar/tentang/pancaPrasetya', 'Tentang::view/pancaPrasetya');
// $routes->get('korprisumbar/tentang/anggota', 'Tentang::view/anggota');
// $routes->get('korprisumbar/tentang/programUtama', 'Tentang::view/programUtama');
