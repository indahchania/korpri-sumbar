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
$routes->post('/save_pages', 'Pages::save_pages');
$routes->get('/edit_pages/(:num)', 'Pages::edit_pages/$1');
$routes->post('/pages/update/(:num)', 'Pages::update_pages/$1');
$routes->get('/delete_pages/(:num)', 'Pages::delete_pages/$1');

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

$routes->get('/tentang', 'Tentang::index');           // Rute utama "Tentang"
$routes->get('/tentang/(:any)', 'Tentang::index/$1'); // untuk halaman detail "Tentang"

$routes->get('/media/(:segment)', 'Media::index/$1');     // Rute utama "Media"
$routes->get('/media/detail/(:num)', 'Media::detail/$1'); // untuk halaman detail "Media"

$routes->get('/karirMenu', 'KarirMenu::index');                   // Rute utama "Karir"
$routes->get('/karirMenu/detail/(:num)', 'KarirMenu::detail/$1'); // untuk halaman detail "Karir"

$routes->get('kontak', 'Kontak::index');
$routes->post('kontak/send', 'Kontak::send');
