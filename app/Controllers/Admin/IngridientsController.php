<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class IngridientsController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function createForm()
    {
        $this->module_data['title'] = 'Create Ingridient';
        $this->module_data['js'] = ['assets/admin/js/create-ingrids.js'];
        return view('admin/ingridients/create',  $this->module_data);
    }

    public function list()
    {
        $this->module_data['title'] = 'Ingridient List';
        return view('admin/ingridients/list',  $this->module_data);
    }
}
