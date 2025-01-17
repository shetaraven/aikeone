<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Admin\Recipes\CategoriesModel;
use App\Models\Admin\Recipes\RecipeCategoryLinkModel;
use App\Models\Admin\Recipes\RecipesModel;

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

        $most_visited_model = new RecipesModel();
        $this->module_data['mv_list'] = $most_visited_model->orderBy('VISIT_COUNT', 'DESC')->withPrivateRecipes()->limit(10)->findAll();

        $random_categs = new CategoriesModel();
        $this->module_data['random_categs'] = $random_categs->orderBy('RAND()')->limit(5)->findAll();

        return view('client/home/index',  $this->module_data);
    }

    public function partialsCategoryRecipes() {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $rcl_model = new RecipeCategoryLinkModel();
        $rcl_list = $rcl_model->where('CATEGORY_ID', $post_data['CATEGORY_ID'])->findAll();

        $recipe_ids = array_column($rcl_list, 'RECIPE_ID');

        $recipe_list = [];
        if( ! empty($recipe_ids ) ) {
            $recipe_model = new RecipesModel();
            $recipe_list = $recipe_model->withPrivateRecipes()->whereIn('ID', $recipe_ids)->limit(10)->findAll();
        }

        return view('client/home/partials/categ_recipes',  [
            'recipe_list' => $recipe_list
        ]);
    }
}
