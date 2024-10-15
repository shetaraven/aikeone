<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to(base_url('/dashboard'));
});

# dashboard routes
$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'dashboard\DefaultController::index');
});

# admin routes
$routes->group('admin', function ($routes) {
    $routes->get('/', 'admin\DefaultController::index');
});
