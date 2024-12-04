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
        $this->module_data['css'] = ['assets/main/css/homepage.css','assets/main/slick/slick.css','assets/main/slick/slick-theme.css','assets/main/css/owl.carousel.min.css','assets/main/css/owl.theme.default.min.css'];
        $this->module_data['js'] = ['assets/main/slick/slick.min.js','assets/main/js/owl.carousel.min.js','assets/main/js/homepage.js','assets/main/js/main.js'];
        return view('client/home/index',  $this->module_data);
    }
}
