<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Dashboard\SysVariablesModel;
use App\Models\Admin\Ingredients\IngredientsModel;
use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Admin\Stores\StoresModel;
use App\Models\Admin\Users\UsersModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = ['assets/admin/js/dashboard.js'];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function index()
    {
        $this->module_data['title'] = 'Dashboard';

        $stats = [];

        $recipe_model = new RecipesModel();
        $stats['recipe_count'] = $recipe_model->countAllResults();

        $ingredients_model = new IngredientsModel();
        $stats['ingredients_count'] = $ingredients_model->countAllResults();

        $stores_model = new StoresModel();
        $stats['stores_count'] = $stores_model->where('ACTIVE', 1)->countAllResults();

        $users_model = new UsersModel();
        $stats['users_count'] = $users_model->where('ACTIVE', 1)->countAllResults();

        $featured_model = new RecipesModel();
        $this->module_data['featured_list'] = $featured_model->where('FEATURED !=', 0)->orderBy('FEATURED', 'ASC')->limit(3)->findAll();

        $most_visited_model = new RecipesModel();
        $this->module_data['mvl_pt1'] = $most_visited_model->orderBy('VISIT_COUNT', 'DESC')->limit(5, 0)->findAll();
        $this->module_data['mvl_pt2'] = $most_visited_model->orderBy('VISIT_COUNT', 'DESC')->limit(5, 5)->findAll();

        $sys_var_model = new SysVariablesModel();
        $this->module_data['exchange_rate'] = $sys_var_model->where('LABEL', 'EXCHANGE_RATE' )->first();

        $this->module_data['stats'] = $stats;
        return view('admin/dashboard/index',  $this->module_data);
    }

    public function partialFeatured() {
        $recipe_model = new RecipesModel();
        $featured_list = $recipe_model->where('FEATURED !=', 0)->where('VISIBILITY', 1)->orderBy('FEATURED', 'ASC')->limit(3)->findAll();
        echo "<pre>";
        print_r( $featured_list );
        die();

        return view('admin/dashboard/partials/_featured_list', [
            'featured_list' => $featured_list
        ]);
    }

    public function partialNotFeatured() {
        $recipe_model = new RecipesModel();
        $recipe_list = $recipe_model->where('FEATURED', 0)->where('VISIBILITY', 1)->findAll();

        return view('admin/dashboard/partials/_not_featured', [
            'recipe_list' => $recipe_list
        ]);
    }
}
