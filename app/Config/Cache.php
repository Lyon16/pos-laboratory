
<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */

$routes = Services::routes();

// Default settings
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(false);

// POS System Routes
$routes->get('/', 'Home::index');
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');


$routes->get('customers/new', 'Customers::new');
$routes->post('customers/create', 'Customers::create');
$routes->get('customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('customers/update/(:num)', 'Customers::update/$1');

$routes->get('users/new', 'Users::new');
$routes->post('users/create', 'Users::create');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');

