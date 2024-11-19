<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes admin
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

<<<<<<< HEAD
$routes->get('/konten', 'Konten::index');
$routes->get('/create_konten', 'Konten::create_konten');
$routes->post('/save_konten', 'Konten::save_konten');
=======
$routes->get('/karir', 'Home::karir');

// Dashboard route
$routes->get('korprisumbar', 'Main::dashboard');

// Routes dinamis untuk semua kategori "Tentang"
$routes->get('korprisumbar/tentang/(:segment)', 'PageController::index/$1');

// Routes statis lainnya untuk kompatibilitas jika diperlukan
$routes->get('korprisumbar/tentang/sejarah', 'Tentang::view/sejarah');
$routes->get('korprisumbar/tentang/visiMisi', 'Tentang::view/visiMisi');
$routes->get('korprisumbar/tentang/tujuanFungsi', 'Tentang::view/tujuanFungsi');
$routes->get('korprisumbar/tentang/pancaPrasetya', 'Tentang::view/pancaPrasetya');
$routes->get('korprisumbar/tentang/anggota', 'Tentang::view/anggota');
$routes->get('korprisumbar/tentang/programUtama', 'Tentang::view/programUtama');

// Routes baru untuk create konten, pages, dan karir
$routes->get('/create_konten', 'Home::create_konten');
$routes->post('/create_konten', 'Home::save_konten');

$routes->get('/create_pages', 'Home::create_pages');

$routes->get('/create_karir', 'Home::create_karir');
>>>>>>> 6385dfe74ef35e3d1b63ff5a5a2179266e26985a
