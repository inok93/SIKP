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
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);
 
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/create', 'Mahasiswa::create');
$routes->post('mahasiswa/store', 'Mahasiswa::store');
$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');

$routes->get('dosen', 'Dosen::index');
$routes->get('dosen/create', 'Dosen::create');
$routes->post('dosen/store', 'Dosen::store');
$routes->get('dosen/edit/(:num)', 'Dosen::edit/$1');
$routes->post('dosen/update/(:num)', 'Dosen::update/$1');
$routes->get('dosen/delete/(:num)', 'Dosen::delete/$1');

$routes->get('kerjapraktek', 'Kerjapraktek::index');
$routes->get('kerjapraktek/create', 'Kerjapraktek::create');
$routes->post('kerjapraktek/store', 'Kerjapraktek::store');
$routes->get('kerjapraktek/edit/(:num)', 'Kerjapraktek::edit/$1');
$routes->post('kerjapraktek/update/(:num)', 'Kerjapraktek::update/$1');
$routes->get('kerjapraktek/delete/(:num)', 'Kerjapraktek::delete/$1');

$routes->get('nilai', 'Nilai::index');
$routes->get('nilai/create', 'Nilai::create');
$routes->post('nilai/store', 'Nilai::store');
$routes->get('nilai/edit/(:num)', 'Nilai::edit/$1');
$routes->post('nilai/update/(:num)', 'Nilai::update/$1');
$routes->get('nilai/delete/(:num)', 'Nilai::delete/$1');


$routes->get('bimbingan', 'Bimbingan::index');
$routes->get('bimbingan/create', 'Bimbingan::create');
$routes->post('bimbingan/store', 'Bimbingan::store');
$routes->get('bimbingan/edit/(:num)', 'Bimbingan::edit/$1');
$routes->post('bimbingan/update/(:num)', 'Bimbingan::update/$1');
$routes->get('bimbingan/delete/(:num)', 'Bimbingan::delete/$1');


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
