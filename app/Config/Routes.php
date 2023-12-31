<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter'=>'authGuard']);


$routes->get('/services', 'ServiceController::index',['filter'=>'authGuard']);
$routes->get('services/create', 'ServiceController::create');
$routes->post('services/store', 'ServiceController::store');


$routes->get('services/edit(:num)', 'ServiceController::edit/$1');
$routes->get('services/delete(:num)', 'ServiceController::delete/$1');
$routes->post('services/update/(:num)', 'ServiceController::update/$1');



$routes->get('/appointment', 'AppointmentController::index', ['filter'=>'authGuard']);

$routes->get('register', 'SingupController::index');
$routes->match(['get', 'post'], 'register/store', 'SingupController::store');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');


