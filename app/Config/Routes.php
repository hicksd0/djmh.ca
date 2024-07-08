<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Multitude::index');

$routes->get('multitude/index', 'Multitude::index');
$routes->get('multitude/stuff', 'Multitude::stuff');

$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('dashboard/index', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('dashboard/cars', 'Dashboard::cars', ['filter' => 'auth']);

//$routes->get('cli/garbage_collection', 'Cli::garbage_collection');
$routes->cli('cli/garbage_collection', 'Cli::garbage_collection');
$routes->cli('cli/once_per_minute_tick', 'Cli::once_per_minute_tick');