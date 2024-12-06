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
        return view('client/recipe/index',  $this->module_data);
    }

    public function details()
    {
        $this->module_data['title'] = 'Recipe Details';
        return view('client/recipe/details',  $this->module_data);
    }
}
