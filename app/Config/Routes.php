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

// pages
$routes->get('dashboard', 'Dashboard::index');