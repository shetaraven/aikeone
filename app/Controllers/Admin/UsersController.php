<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Users\UsersModel;
use App\Models\Admin\Users\UserTypesModel;

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = ['assets/admin/js/users.js'];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function list()
    {
        $this->module_data['title'] = 'User List';
        $users_model = new UsersModel();
        $this->module_data['user_list'] = $users_model->where('USER_TYPE_ID !=', 0)->withUserType()->orderBy('CREATED_AT', 'DESC')->paginate(5, 'admin');
        $this->module_data['pager']     = $users_model->pager;

        $user_type_model = new UserTypesModel();
        $this->module_data['user_types'] = $user_type_model->findAll();

        return view('admin/users/list',  $this->module_data);
    }

    public function partialEditForm()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $users_model = new UsersModel();
        $user_info = $users_model->where('ID', $post_data['USER_ID'])->first();

        $user_type_model = new UserTypesModel();
        $user_types = $user_type_model->findAll();

        return view('admin/users/partials/_edit_user', [
            'user_info' => $user_info,
            'user_types' => $user_types
        ]);
    }
}
