<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class RecipesController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
    }

    public function index()
    {
        $this->module_data['title'] = 'Recipes';
        $this->module_data['css'] = ['/assets/main/css/all-recipe.css'];
        $this->module_data['js'] = [];
        return view('client/recipe/index',  $this->module_data);
    }

    public function details()
    {
        $this->module_data['title'] = 'Recipe Details';
        $this->module_data['css'] = ['/assets/main/css/details.css'];
        $this->module_data['js'] = ['/assets/main/js/details.js'];
        return view('client/recipe/details',  $this->module_data);
    }
}
