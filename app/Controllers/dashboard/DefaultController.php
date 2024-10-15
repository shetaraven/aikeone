<?php

namespace App\Controllers\dashboard;

use App\Controllers\BaseController;

class DefaultController extends BaseController
{
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Dashboard',
        ]);
    }
}
