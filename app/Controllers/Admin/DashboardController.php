<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function index()
    {
        $this->module_data['title'] = 'Dashboard';
        return view('admin/dashboard/index',  $this->module_data);
    }
}
