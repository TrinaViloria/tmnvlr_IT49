<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/customer-accounts', 'CustomerAccounts::index', ['filter' => 'auth']);
$routes->get('/customer-accounts/new', 'CustomerAccounts::new', ['filter' => 'auth']);
$routes->post('/customer-accounts', 'CustomerAccounts::create', ['filter' => 'auth']);
$routes->get('/customer-accounts/(:num)/edit', 'CustomerAccounts::edit/$1', ['filter' => 'auth']);
$routes->put('/customer-accounts/(:num)', 'CustomerAccounts::update/$1', ['filter' => 'auth']);
$routes->post('/customer-accounts/(:num)', 'CustomerAccounts::update/$1', ['filter' => 'auth']);
$routes->delete('/customer-accounts/(:num)', 'CustomerAccounts::delete/$1', ['filter' => 'auth']);
$routes->post('/customer-accounts/(:num)/delete', 'CustomerAccounts::delete/$1', ['filter' => 'auth']);
$routes->get('/customer-accounts/(:num)', 'CustomerAccounts::viewAccount/$1', ['filter' => 'auth']);
