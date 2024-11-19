<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes admin
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/login', 'Home::login');
$routes->get('/admin', 'Home::admin');
$routes->get('/konten', 'Home::konten');
$routes->get('/pages', 'Home::pages');
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
