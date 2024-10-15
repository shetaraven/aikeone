<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class DefaultController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [
            'assets/css/admin/admin.css'
        ];

        $this->module_data['js'] = [
            'assets/js/admin/admin.js'
        ];
    }

    public function index()
    {
        $this->module_data['title'] = 'Admin';
        return view('admin/index',  $this->module_data);
    }
}
