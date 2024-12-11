<?php

namespace App\Filters;

use App\Models\Admin\Recipes\RecipesModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class VisitCountFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $request = Services::request();
        $get_data = $request->getGet();

        if( $get_data['id'] ) {
            $recipes_model = new RecipesModel();
            $recipe_info = $recipes_model->where('ID', $get_data['id'])->first();

            $recipes_model->update($recipe_info['ID'], [
                'VISIT_COUNT' => $recipe_info['VISIT_COUNT'] + 1
            ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action after the request
    }
}
