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

// Point this route at your existing dashboard controller if its name differs.
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/customer-accounts', 'CustomerAccounts::index', ['filter' => 'auth']);
$routes->get('/customer-accounts/(:num)', 'CustomerAccounts::viewAccount/$1', ['filter' => 'auth']);
