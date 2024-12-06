<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
    }

    public function index()
    {
        $this->module_data['title'] = 'Profile';
        return view('client/profile/index',  $this->module_data);
    }

    public function collections()
    {
        $this->module_data['title'] = 'My Collection';
        $this->module_data['css'] = ['/assets/main/css/collections.css'];
        $this->module_data['js'] = [];
        return view('client/profile/collections',  $this->module_data);
    }
}
