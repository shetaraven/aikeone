<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// replace to client home
// $routes->get('/', function () {
//     return redirect()->to(base_url('/home'));
// });

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
        $routes->get('form', 'Admin\StoresController::form');
        $routes->post('partial-edit-form', 'Admin\StoresController::partialEditForm');
    });

    $routes->group('ingredients', function ($routes) {
        $routes->get('/', 'Admin\IngredientsController::list');

        # pages
        $routes->get('list', 'Admin\IngredientsController::list');
        $routes->get('form', 'Admin\IngredientsController::form');
        $routes->post('partial-edit-form', 'Admin\IngredientsController::partialEditForm');
    });

    $routes->group('recipes', function ($routes) {
        $routes->get('/', 'Admin\RecipesController::list');
        $routes->get('list', 'Admin\RecipesController::list');
        $routes->get('form', 'Admin\RecipesController::form');
        $routes->get('partial-ingreds-list', 'Admin\RecipesController::partialIngredsList');
        $routes->post('partial-ingreds-set', 'Admin\RecipesController::partialIngredsSet');
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

        # recipes rest request
        $routes->get('recipes', 'Admin\Api\V1\RecipesController::list');
        $routes->get('recipes/(:num)', 'Admin\Api\V1\RecipesController::show/$1');
        $routes->post('recipes', 'Admin\Api\V1\RecipesController::create');
        $routes->post('recipes/(:num)', 'Admin\Api\V1\RecipesController::update/$1');
        $routes->delete('recipes/(:num)', 'Admin\Api\V1\RecipesController::delete/$1');
        
        # recipe ingridient request
        $routes->delete('recipe-ingridients/(:num)', 'Admin\Api\V1\RecipeIngredientController::delete/$1');
    });
});

# client routes
$routes->group('', function ($routes) {
    $routes->get('/', 'Client\HomeController::index');

    $routes->group('recipes', function ($routes) {
        $routes->get('/', 'Client\RecipesController::index');
        $routes->get('details', 'Client\RecipesController::details');
    });

    $routes->group('profile', function ($routes) {
        $routes->get('/', 'Client\ProfileController::index');
        $routes->get('collections', 'Client\ProfileController::collections');
    });
});
