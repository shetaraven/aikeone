<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Stores\StoresModel;

class StoresController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [
            'assets/admin/js/stores.js'
        ];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function createForm()
    {
        $this->module_data['title'] = 'Create Stores';
        return view('admin/stores/create',  $this->module_data);
    }

    public function list()
    {
        $this->module_data['title'] = 'Stores List';

        $stores_model = new StoresModel();
        $this->module_data['store_list'] = $stores_model->withCreator()->findAll();

        return view('admin/stores/list',  $this->module_data);
    }

    public function partialEditForm()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $stores_model = new StoresModel();
        $store_info = $stores_model->where('ID', $post_data['STORE_ID'])->first();

        return view('admin/stores/_template_edit_store', [
            'store_info' => $store_info
        ]);
    }
}
