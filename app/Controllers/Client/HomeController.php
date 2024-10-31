<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
    }

    public function index()
    {
        $this->module_data['title'] = 'Home';
        return view('client/home/index',  $this->module_data);
    }
}
