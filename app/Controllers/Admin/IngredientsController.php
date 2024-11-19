<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Ingredients\IngredientsModel;

class IngredientsController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [
            'assets/admin/js/ingredients.js'
        ];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function createForm()
    {
        $this->module_data['title'] = 'Create Ingridient';
        return view('admin/ingridients/create',  $this->module_data);
    }

    public function list()
    {
        $this->module_data['title'] = 'Ingridient List';

        $ingreds_model = new IngredientsModel();
        $this->module_data['ingredients_list'] = $ingreds_model->withCreator()->findAll();

        return view('admin/ingridients/list',  $this->module_data);
    }

    public function partialEditForm()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $ingreds_model = new IngredientsModel();
        $ingredient_info = $ingreds_model->where('ID', $post_data['INGRID_ID'])->first();

        return view('admin/ingridients/_template_edit_ingred', [
            'ingredient_info' => $ingredient_info
        ]);
    }
}
