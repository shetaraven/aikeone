<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RecipesController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function createForm()
    {
        $this->module_data['title'] = 'Create Recipes';
        $this->module_data['js'] = ['assets/admin/js/create-recipe.js'];
        return view('admin/recipes/create',  $this->module_data);
    }

    public function list()
    {
        $this->module_data['title'] = 'Recipes List';
        return view('admin/recipes/list',  $this->module_data);
    }
}
