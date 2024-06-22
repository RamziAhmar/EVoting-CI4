<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes Home 
$routes->get('/', 'Home\Home::index');
$routes->get('/peserta', 'Home\Peserta::index');
$routes->get('/pemilihan', 'Home\Pemilihan::index');
$routes->get('/vote/(:num)/(:num)', 'Home\Home::vote/$1/$2');

// Routes Authentication
$routes->get('/login', 'Auth::index');
$routes->post('/login/proses', 'Auth::proses');
$routes->get('/logout', 'Auth::logout');

// Routes Admin
// Routes Admin Home
$routes->get('/admin', 'Home\Home::index');
// Routes Admin Dashboard
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');
// Routes Admin User
$routes->get('/admin/user', 'Admin\User::index');
$routes->post('/admin/user/insert', 'Admin\User::insert');
$routes->post('/admin/user/update/(:num)', 'Admin\User::update/$1');
$routes->get('/admin/user/delete/(:num)', 'Admin\User::delete/$1');
// Routes Admin Kandidat
$routes->get('/admin/kandidat', 'Admin\Kandidat::index');
$routes->post('/admin/kandidat/insert', 'Admin\Kandidat::insert');
$routes->post('/admin/kandidat/update/(:num)', 'Admin\Kandidat::update/$1');
$routes->get('/admin/kandidat/delete/(:num)', 'Admin\Kandidat::delete/$1');
// Routes Admin Pemilihan
$routes->get('/admin/pemilihan', 'Admin\Pemilihan::index');
$routes->post('/admin/pemilihan/insert', 'Admin\Pemilihan::insert');
$routes->post('/admin/pemilihan/update/(:num)', 'Admin\Pemilihan::update/$1');
$routes->get('/admin/pemilihan/delete/(:num)', 'Admin\Pemilihan::delete/$1');
// Routes Admin Status Pemilihan
$routes->get('/admin/status_pemilihan', 'Admin\StatusPemilihan::index');
// Routes Admin Suara
$routes->get('/admin/suara', 'Admin\Suara::index');

