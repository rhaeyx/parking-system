<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// auth
$routes->get('register', 'Auth::registerPage');
$routes->post('register', 'Auth::register');

$routes->get('login', 'Auth::loginPage');
$routes->post('login', 'Auth::login');

$routes->post('logout', 'Auth::logout');

// pages
$routes->get('dashboard', 'Dashboard::index');
$routes->post('reserve', 'Dashboard::reserve');
$routes->get('reservations', 'Dashboard::reservations');
$routes->post('reservations', 'Dashboard::update');
$routes->post('delete_reservation', 'Dashboard::delete');