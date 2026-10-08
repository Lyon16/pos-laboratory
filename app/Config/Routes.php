
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
