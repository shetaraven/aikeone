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
$routes->group('admin', ['filter' => ['auth', 'dashboard']], function ($routes) {
    $routes->get('/', function () {
        return redirect()->to(base_url('/admin/dashboard'));
    });

    $routes->group('dashboard', function ($routes) {
        $routes->get('/', 'Admin\DashboardController::index');
        $routes->get('partial-featured-list', 'Admin\DashboardController::partialFeatured');
        $routes->get('partial-not-featured', 'Admin\DashboardController::partialNotFeatured');
    });

    $routes->group('users', ['filter' => ['is_admin']], function ($routes) {
        $routes->get('/', 'Admin\UsersController::list');
        $routes->get('list', 'Admin\UsersController::list');
        $routes->post('partial-edit-form', 'Admin\UsersController::partialEditForm');
        $routes->post('partial-priv-recipe-list', 'Admin\UsersController::partialPrivRecipesList');
        $routes->post('partial-user-recommend-recipe-list', 'Admin\UsersController::partialUserRecommendRecipesList');
    });

    $routes->group('stores', function ($routes) {
        $routes->get('/', 'Admin\StoresController::list');

        # pages
        $routes->get('list', 'Admin\StoresController::list');
        $routes->post('list', 'Admin\StoresController::list');
        $routes->get('form', 'Admin\StoresController::form');
        $routes->post('partial-edit-form', 'Admin\StoresController::partialEditForm');
    });

    $routes->group('ingredients', function ($routes) {
        $routes->get('/', 'Admin\IngredientsController::list');

        # pages
        $routes->get('list', 'Admin\IngredientsController::list');
        $routes->post('list', 'Admin\IngredientsController::list');
        $routes->get('form', 'Admin\IngredientsController::form');
        $routes->post('partial-edit-form', 'Admin\IngredientsController::partialEditForm');
    });

    $routes->group('recipes', function ($routes) {
        $routes->get('/', 'Admin\RecipesController::list');
        $routes->get('list', 'Admin\RecipesController::list');
        $routes->post('list', 'Admin\RecipesController::list');
        $routes->get('form', 'Admin\RecipesController::form');
        $routes->post('partial-ingreds-list', 'Admin\RecipesController::partialIngredsList');
        $routes->post('partial-ingreds-set', 'Admin\RecipesController::partialIngredsSet');
    });

    $routes->group('categories', function ($routes) {
        $routes->get('/', 'Admin\CategoriesController::list');
        $routes->get('list', 'Admin\CategoriesController::list');
        $routes->post('list', 'Admin\CategoriesController::list');
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
        $routes->get('categories', 'Admin\Api\V1\CategoriesController::list');
        $routes->get('categories/(:num)', 'Admin\Api\V1\CategoriesController::show/$1');
        $routes->post('categories', 'Admin\Api\V1\CategoriesController::create');
        $routes->put('categories/(:num)', 'Admin\Api\V1\CategoriesController::update/$1');
        $routes->delete('categories/(:num)', 'Admin\Api\V1\CategoriesController::delete/$1');

        # recipe ingredient rest requests
        $routes->delete('recipe-ingredients/(:num)', 'Admin\Api\V1\RecipeIngredientController::delete/$1');

        # recipe sub rest requests
        $routes->delete('recipe-sub/(:num)', 'Admin\Api\V1\RecipeSubController::delete/$1');

        # dashboard rest requests
        $routes->post('dashboard', 'Admin\Api\V1\DashboardController::update');

        # user rest requests
        $routes->get('users/(:num)', 'Admin\Api\V1\UsersController::show/$1');
        $routes->put('users/(:num)', 'Admin\Api\V1\UsersController::update/$1');

        # user system variables requests
        $routes->post('system/rate/update', 'Admin\Api\V1\SysVariablesController::updateExhangeRate/');

        # priv recipe rest requests
        $routes->post('priv-recipe-link', 'Admin\Api\V1\RecipePrivatesAccessLinkController::create');
        $routes->delete('priv-recipe-link/(:num)', 'Admin\Api\V1\RecipePrivatesAccessLinkController::delete/$1');

        # recipe user feature rest requests
        $routes->post('recipe-user-recommend-link', 'Admin\Api\V1\RecipeUserRecommendController::create');
        $routes->delete('recipe-user-recommend-link/(:num)', 'Admin\Api\V1\RecipeUserRecommendController::delete/$1');
    });
});

# client routes
$routes->group('', ['filter' => ['daily_crons']], function ($routes) {
    $routes->get('/', 'Client\HomeController::index');

    $routes->group('home', function ($routes) {
        $routes->post('partials-category-recipes', 'Client\HomeController::partialsCategoryRecipes');
    });

    $routes->group('recipes', function ($routes) {
        $routes->get('/', 'Client\RecipesController::index');
        $routes->get('details', 'Client\RecipesController::details', ['filter' => 'visit_count']);
        $routes->get('partials-ingreds-calc/(:num)', 'Client\RecipesController::partailIngredCalc/$1');
        $routes->get('partials-nutri-vals/(:num)', 'Client\RecipesController::partailNutriVals/$1');
        $routes->get('partials-serving-calc/(:num)', 'Client\RecipesController::partailServingCalc/$1');
    });

    $routes->group('profile', function ($routes) {
        $routes->get('/', 'Client\ProfileController::index');
        $routes->get('collections', 'Client\ProfileController::collections', ['filter' => ['auth']]);
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
