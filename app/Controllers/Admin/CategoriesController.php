<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Recipes\CategoriesModel;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [
            'assets/admin/js/categories.js'
        ];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function form()
    {
        $this->module_data['title'] = 'Create Category';
        return view('admin/categories/create',  $this->module_data);
    }

    public function list()
    {
        $request = \Config\Services::request();

        if ($request->getMethod() == 'GET') {
            $categories_model   = new CategoriesModel();
            $category_list      = $categories_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(5, 'admin');

            $this->module_data['title'] = 'Category List';
            $this->module_data['category_list'] = $category_list;
            $this->module_data['pager']         = $categories_model->pager;
            return view('admin/categories/list',  $this->module_data);
        } else {
            $post_data = $request->getPost();

            $categories_model   = new CategoriesModel();
            if (isset($post_data['search'])) {
                $categories_model->like('LABEL', $post_data['search']);
            }
            $category_list = $categories_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(5, 'admin');

            $table_data = view('admin/categories/partials/_table_data',  [
                'category_list' => $category_list
            ]);

            $list_count_model = new CategoriesModel();
            if ($post_data['search']) {
                $list_count_model->like('LABEL', $post_data['search']);
            }
            $list_count     = $list_count_model->countAllResults();

            return $this->response->setJSON([
                'table_data' => $table_data,
                'pager' => $categories_model->pager->makeLinks(1, 5, $list_count, 'admin', 0, 'admin'),
            ]);
        }
    }

    public function partialEditForm()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $categories_model = new CategoriesModel();
        $rc_info = $categories_model->where('ID', $post_data['RC_ID'])->first();

        return view('admin/categories/partials/_edit_category', [
            'rc_info' => $rc_info
        ]);
    }

    // public function partialTableRefresh()
    // {
    //     $request = \Config\Services::request();
    //     $post_data = $request->getPost();

    //     $categories_model = new CategoriesModel();
    //     if ($post_data['search']) {
    //         $categories_model->like('LABEL', $post_data['search']);
    //     }
    //     $category_list  = $categories_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(5, 'admin');

    //     $list_count_model = new CategoriesModel();
    //     if ($post_data['search']) {
    //         $list_count_model->like('LABEL', $post_data['search']);
    //     }
    //     $list_count     = $list_count_model->countAllResults();



    //     return $this->response->setJSON([
    //         'table_data' => $table_data,
    //         'pager' => $categories_model->pager->makeLinks(1, 5, $list_count, 'admin'),
    //     ]);
    // }
}
