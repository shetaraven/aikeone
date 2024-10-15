<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to(base_url('/dashboard'));
});

$routes->get('dashboard', 'dashboard\DefaultController::index');