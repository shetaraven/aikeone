<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class DefaultController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];

        $this->module_data['js'] = [];
    }

    public function index()
    {
        $this->module_data['title'] = 'Login';
        return view('auth/index',  $this->module_data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/auth/login'));
    }
}
