<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('multitude/index', 'Multitude::index');
$routes->get('multitude/stuff', 'Multitude::stuff');

$routes->get('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

//$routes->get('cli/garbage_collection', 'Cli::garbage_collection');
$routes->cli('cli/garbage_collection', 'Cli::garbage_collection');