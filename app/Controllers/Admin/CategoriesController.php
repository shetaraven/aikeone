<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Recipes\RecipeCategoriesModel;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function form()
    {
        $this->module_data['title'] = 'Create Category';
        return view('admin/categories/create',  $this->module_data);
    }

    public function list()
    {
        $this->module_data['title'] = 'Category List';

        $categories_model = new RecipeCategoriesModel();
        $this->module_data['category_list']    = $categories_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate( 5, 'admin');
        $this->module_data['pager']         = $categories_model->pager;

        return view('admin/tags/list',  $this->module_data);
    }
}
