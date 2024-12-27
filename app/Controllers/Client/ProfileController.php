<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Client\Users\UserFavoritesModel;
use Config\Database;

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

        $user_favs_model = new UserFavoritesModel();
        $favorites_list = $user_favs_model->where('USER_ID', session()->get('ID'))->findAll();
        $favorites_list = array_column($favorites_list, 'RECIPE_ID');

        $this->module_data['recipe_list']   = [];
        if (! empty($favorites_list)) {
            $recipes_model = new RecipesModel();
            $this->module_data['recipe_list'] = $recipes_model->whereIn('ID', $favorites_list)->withPrivateRecipes()->paginate(10, 'admin');
            $this->module_data['pager']       = $recipes_model->pager;
        }

        return view('client/profile/collections',  $this->module_data);
    }
}
