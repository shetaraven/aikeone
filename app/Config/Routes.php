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
$routes->group('admin', ['filter' => ['auth', 'user_type']], function ($routes) {
    $routes->get('/', function () {
        return redirect()->to(base_url('/admin/dashboard'));
    });

    $routes->group('dashboard', function ($routes) {
        $routes->get('/', 'Admin\DashboardController::index');
    });

    $routes->group('users', function ($routes) {
        $routes->get('/', 'Admin\UsersController::list');
        $routes->get('list', 'Admin\UsersController::list');
        $routes->post('partial-edit-form', 'Admin\UsersController::partialEditForm');
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

    $routes->group('categories', function ($routes) {
        $routes->get('/', 'Admin\CategoriesController::list');
        $routes->get('list', 'Admin\CategoriesController::list');
        $routes->get('form', 'Admin\CategoriesController::form');
        $routes->post('partial-edit-form', 'Admin\CategoriesController::partialEditForm');
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

        # recipe categories rest request
        $routes->get('recipe-categories', 'Admin\Api\V1\CategoriesController::list');
        $routes->get('recipe-categories/(:num)', 'Admin\Api\V1\CategoriesController::show/$1');
        $routes->post('recipe-categories', 'Admin\Api\V1\CategoriesController::create');
        $routes->put('recipe-categories/(:num)', 'Admin\Api\V1\CategoriesController::update/$1');
        $routes->delete('recipe-categories/(:num)', 'Admin\Api\V1\CategoriesController::delete/$1');
        
        # recipe ingredient rest requests
        $routes->delete('recipe-ingredients/(:num)', 'Admin\Api\V1\RecipeIngredientController::delete/$1');

        # user rest requests
        $routes->get('users/(:num)', 'Admin\Api\V1\UsersController::show/$1');
        $routes->put('users/(:num)', 'Admin\Api\V1\UsersController::update/$1');
    });
});

# client routes
$routes->group('', function ($routes) {
    $routes->get('/', 'Client\HomeController::index');

    $routes->group('recipes', function ($routes) {
        $routes->get('/', 'Client\RecipesController::index');
        $routes->get('details', 'Client\RecipesController::details');
        $routes->get('partials-ingreds-calc/(:num)', 'Client\RecipesController::partailIngredCalc/$1');
        $routes->get('partials-nutri-vals/(:num)', 'Client\RecipesController::partailNutriVals/$1');
        $routes->get('partials-serving-calc/(:num)', 'Client\RecipesController::partailServingCalc/$1');
    });

    $routes->group('profile', function ($routes) {
        $routes->get('/', 'Client\ProfileController::index');
        $routes->get('collections', 'Client\ProfileController::collections');
    });

    $routes->group('api', function ($routes) {
        # user favorites rest request
        $routes->get('user-fav', 'Client\Api\V1\UserFavoritesController::list');
        $routes->get('user-fav/(:num)', 'Client\Api\V1\UserFavoritesController::show/$1');
        $routes->post('user-fav', 'Client\Api\V1\UserFavoritesController::create');
        $routes->post('user-fav/(:num)', 'Client\Api\V1\UserFavoritesController::update/$1');
        $routes->delete('user-fav/(:num)', 'Client\Api\V1\UserFavoritesController::delete/$1');
    });
});
