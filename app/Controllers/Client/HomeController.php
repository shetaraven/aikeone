<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
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
            'assets/main/slick/slick.min.js',
            'assets/main/js/owl.carousel.min.js',
            'assets/main/js/homepage.js',
            'assets/main/js/main.js'
        ];

        $featured_model = new RecipesModel();
        $this->module_data['featured_list'] = $featured_model->where('FEATURED !=', 0)->orderBy('FEATURED', 'ASC')->withPrivateRecipes()->limit(3)->findAll();

        $most_visited_model = new RecipesModel();
        $this->module_data['mv_list'] = $most_visited_model->orderBy('VISIT_COUNT', 'DESC')->withPrivateRecipes()->limit(10)->findAll();

        return view('client/home/index',  $this->module_data);
    }
}
