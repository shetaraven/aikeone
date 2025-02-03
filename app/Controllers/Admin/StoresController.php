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

    public function form()
    {
        $this->module_data['title'] = 'Create Stores';
        return view('admin/stores/create',  $this->module_data);
    }

    public function list()
    {
        $request = \Config\Services::request();

        if ($request->getMethod() == 'GET') {
            $this->module_data['title'] = 'Stores List';

            $stores_model = new StoresModel();
            if (session()->get('USER_TYPE_ID') == 2) {
                $stores_model->where('CREATED_BY', session()->get('ID'));
            }

            $this->module_data['store_list']    = $stores_model->where('stores.ACTIVE', 1)->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(5, 'admin');
            $this->module_data['pager']         = $stores_model->pager;

            return view('admin/stores/list',  $this->module_data);
        } else {
            $post_data = $request->getPost();

            $stores_model   = new StoresModel();
            $list_count_model = new StoresModel();

            if (isset($post_data['search'])) {
                $stores_model->like('NAME', $post_data['search']);
                $list_count_model->like('NAME', $post_data['search']);
            }

            if (session()->get('USER_TYPE_ID') == 2) {
                $stores_model->where('CREATED_BY', session()->get('ID'));
                $list_count_model->where('CREATED_BY', session()->get('ID'));
            }

            $store_list = $stores_model->where('stores.ACTIVE', 1)->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(5, 'admin');
            $table_data = view('admin/stores/partials/_table_data',  [
                'store_list' => $store_list
            ]);

            $list_count = $list_count_model->countAllResults();

            return $this->response->setJSON([
                'table_data' => $table_data,
                'pager' => $stores_model->pager->makeLinks(1, 5, $list_count, 'admin', 0, 'admin'),
            ]);
        }
    }

    public function partialEditForm()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $stores_model = new StoresModel();
        $store_info = $stores_model->where('ID', $post_data['STORE_ID'])->first();

        return view('admin/stores/partials/_template_edit_store', [
            'store_info' => $store_info
        ]);
    }
}
