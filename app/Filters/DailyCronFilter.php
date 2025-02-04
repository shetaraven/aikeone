<?php

namespace App\Filters;

use App\Models\Admin\Dashboard\SysVariablesModel;
use App\Models\Admin\Recipes\RecipesModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class DailyCronFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $sys_vars_model = new SysVariablesModel();
        $roth_info = $sys_vars_model->where('LABEL', 'ROTD')->first();

        if (date('Y-m-d', strtotime($roth_info['UPDATED_AT'])) !== date('Y-m-d')) {
            $random_recipe = new RecipesModel();
            $random_recipe = $random_recipe->orderBy('RAND()')->first();

            $update_featured = new SysVariablesModel();
            $update_featured->where('LABEL', 'ROTD')->set(['VALUE' => $random_recipe['ID']])->update();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action after the request
    }
}
