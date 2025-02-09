<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Admin\Dashboard\SysVariablesModel;
use App\Models\Admin\Recipes\CategoriesModel;
use App\Models\Admin\Recipes\RecipeCategoryLinkModel;
use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Admin\Recipes\RecipeUserRecentLinkModel;
use App\Models\Admin\Recipes\RecipeUserRecommendLinkModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
    }

    public function index()
    {
        $this->module_data['title'] = 'Home';
        $this->module_data['css'] = [
            'assets/main/css/homepage.css',
            'assets/main/slick/slick.css',
            'assets/main/slick/slick-theme.css',
            'assets/main/css/owl.carousel.min.css',
            'assets/main/css/owl.theme.default.min.css'
        ];

        $this->module_data['js'] = [
            '/assets/client/js/home.js',
            '/assets/client/js/common_functions.js',
            'assets/main/slick/slick.min.js',
            'assets/main/js/owl.carousel.min.js',
            'assets/main/js/homepage.js',
            'assets/main/js/main.js'
        ];

        $featured_model = new RecipesModel();
        $this->module_data['featured_list'] = $featured_model->where('FEATURED !=', 0)->orderBy('FEATURED', 'ASC')->withPrivateRecipes()->limit(3)->findAll();

        $rurl_model = new RecipeUserRecommendLinkModel();
        $recommended_ids = $rurl_model->where('USER_ID', session()->get('ID'))->findAll();
        $recommended_ids = array_column($recommended_ids, 'RECIPE_ID');

        $this->module_data['rc_list'] = [];
        if (! empty($recommended_ids)) {
            $recomended_recipes = new RecipesModel();
            $this->module_data['rc_list'] = $recomended_recipes->whereIn('ID', $recommended_ids)->findAll();
        }

        $rurl_model = new RecipeUserRecentLinkModel();
        $recent_ids = $rurl_model->where('USER_ID', session()->get('ID'))->orderBy('UPDATED_AT', 'DESC')->findAll();
        $recent_ids = array_column($recent_ids, 'RECIPE_ID');

        $this->module_data['ro_list'] = [];
        if (! empty($recent_ids)) {
            $recent_recipes = new RecipesModel();
            $this->module_data['ro_list'] = $recent_recipes->whereIn('ID', $recent_ids)->orderBy("UPDATED_AT", 'DESC', false)->findAll();
        }
        // echo "<pre>";
        // print_r( $recent_ids );
        // print_r( $this->module_data['ro_list'] );
        // echo "</pre>";
        // die();

        $most_visited_model = new RecipesModel();
        $this->module_data['mv_list'] = $most_visited_model->orderBy('VISIT_COUNT', 'DESC')->withPrivateRecipes()->limit(10)->findAll();

        $random_categs = new CategoriesModel();
        $this->module_data['random_categs'] = $random_categs->orderBy('RAND()')->limit(5)->findAll();

        $sys_vars_model = new SysVariablesModel();
        $roth_info = $sys_vars_model->where('LABEL', 'ROTD')->first();

        $rotd_model = new RecipesModel();
        $this->module_data['rotd_info'] = $rotd_model->where('ID', $roth_info['VALUE'])->first();

        return view('client/home/index',  $this->module_data);
    }

    public function partialsCategoryRecipes()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $rcl_model = new RecipeCategoryLinkModel();
        $rcl_list = $rcl_model->where('CATEGORY_ID', $post_data['CATEGORY_ID'])->findAll();

        $recipe_ids = array_column($rcl_list, 'RECIPE_ID');

        $recipe_list = [];
        if (! empty($recipe_ids)) {
            $recipe_model = new RecipesModel();
            $recipe_list = $recipe_model->withPrivateRecipes()->whereIn('ID', $recipe_ids)->limit(10)->findAll();
        }

        return view('client/home/partials/categ_recipes',  [
            'recipe_list' => $recipe_list
        ]);
    }
}
