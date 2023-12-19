<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/services', 'ServiceController::index');
$routes->get('services/create', 'ServiceController::create');
$routes->post('services/store', 'ServiceController::store');

