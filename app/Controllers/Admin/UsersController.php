<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Users\UsersModel;

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
        $this->module_data['user_list'] = $users_model->withUserType()->findAll();

        return view('admin/users/list',  $this->module_data);
    }
}
