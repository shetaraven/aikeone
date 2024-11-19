<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// replace to client home
$routes->get('/', function () {
    return redirect()->to(base_url('/home'));
});

# authentication routes
$routes->group('auth', function ($routes) {
    $routes->get('/', function () {
        return redirect()->to(base_url('/auth/login'));
    });
    $routes->get('login', 'Auth\DefaultController::index');
    $routes->get('logout', 'Auth\DefaultController::logout');

    $routes->get('google-auth', 'Auth\GoogleAuthController::googleLogin');
    $routes->get('google-callback', 'Auth\GoogleAuthController::googleCallback');
});

# admin routes
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', function () {
        return redirect()->to(base_url('/admin/dashboard'));
    });

    $routes->group('dashboard', function ($routes) {
        $routes->get('/', 'Admin\DashboardController::index');
    });

    $routes->group('users', function ($routes) {
        $routes->get('/', 'Admin\UsersController::list');
        $routes->get('list', 'Admin\UsersController::list');
    });

    $routes->group('stores', function ($routes) {
        $routes->get('/', 'Admin\StoresController::list');

        # pages
        $routes->get('list', 'Admin\StoresController::list');
        $routes->get('create-form', 'Admin\StoresController::createForm');
        $routes->post('partial-edit-form', 'Admin\StoresController::partialEditForm');
    });

    $routes->group('ingredients', function ($routes) {
        $routes->get('/', 'Admin\IngredientsController::list');

        # pages
        $routes->get('list', 'Admin\IngredientsController::list');
        $routes->get('create-form', 'Admin\IngredientsController::createForm');
        $routes->post('partial-edit-form', 'Admin\IngredientsController::partialEditForm');
    });

    $routes->group('recipes', function ($routes) {
        $routes->get('/', 'Admin\RecipesController::list');
        $routes->get('list', 'Admin\RecipesController::list');
        $routes->get('create-form', 'Admin\RecipesController::createForm');
    });

    $routes->group('api', function ($routes) {
        # stores rest request
        $routes->get('stores', 'Admin\Api\V1\StoresController::list');
        $routes->get('stores/(:num)', 'Admin\Api\V1\StoresController::show/$1');
        $routes->post('stores', 'Admin\Api\V1\StoresController::create');
        $routes->put('stores/(:num)', 'Admin\Api\V1\StoresController::update/$1');
        $routes->delete('stores/(:num)', 'Admin\Api\V1\StoresController::delete/$1');

        # ingredients rest request
        $routes->get('ingredients', 'Admin\Api\V1\IngredientsController::list');
        $routes->get('ingredients/(:num)', 'Admin\Api\V1\IngredientsController::show/$1');
        $routes->post('ingredients', 'Admin\Api\V1\IngredientsController::create');
        $routes->put('ingredients/(:num)', 'Admin\Api\V1\IngredientsController::update/$1');
        $routes->delete('ingredients/(:num)', 'Admin\Api\V1\IngredientsController::delete/$1');
    });
});

# client routes
$routes->group('home', function ($routes) {
    $routes->get('/', 'Client\HomeController::index');
});
