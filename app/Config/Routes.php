<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Books::index');
$routes->get('/tambah', 'Books::tambah');  
$routes->post('/save', 'Books::save');

$routes->get('/edit/(:any)', 'Books::edit/$1');
$routes->post('/edit/(:any)', 'Books::update/$1');
$routes->get('/details/(:any)', 'Books::detail/$1');
$routes->delete('/(:num)', 'Books::delete/$1');

$routes->get('/api/books', 'BooksAPI::index');
$routes->post('/api/transaction', 'TransactionAPI::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('/logout', 'LoginController::logout');