<?php

namespace App\Controllers\dashboard;

use App\Controllers\BaseController;

class DefaultController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [
            'assets/css/dashboard/dashboard.css'
        ];

        $this->module_data['js'] = [
            'assets/js/dashboard/dashboard.js'
        ];
    }

    public function index()
    {
        $this->module_data['title'] = 'Dashboard';
        return view('dashboard/index',  $this->module_data);
    }
}
