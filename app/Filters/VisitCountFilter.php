<?php

namespace App\Filters;

use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Admin\Recipes\RecipeUserRecentLinkModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

helper('common_helpers');

class VisitCountFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $request = Services::request();
        $get_data = $request->getGet();

        if ($get_data['id']) {
            $recipes_model = new RecipesModel();
            $recipe_info = $recipes_model->where('ID', $get_data['id'])->first();

            if ($recipe_info) {
                $recipes_model->update($recipe_info['ID'], [
                    'VISIT_COUNT' => $recipe_info['VISIT_COUNT'] + 1
                ]);

                if (session()->get('ID')) {

                    $check_if_recent_model = new RecipeUserRecentLinkModel();
                    $check_if_recent = $check_if_recent_model->where('USER_ID', session()->get('ID'))->where('RECIPE_ID', $get_data['id'])->orderBy('UPDATED_AT')->first();
                    if (!$check_if_recent) {
                        $insert_data = [
                            'USER_ID'   => session()->get('ID'),
                            'RECIPE_ID' => $get_data['id'],
                        ];
                        $new_rurl = new RecipeUserRecentLinkModel();
                        $new_rurl->insert($insert_data);
                    } else {
                        $update_data = [
                            'UPDATED_AT' => date('Y-m-d H:i:s')
                        ];
                        $update_rurl = new RecipeUserRecentLinkModel();
                        $update_rurl->update($check_if_recent['ID'], $update_data);
                    }

                    $all_recent_model = new RecipeUserRecentLinkModel();
                    $all_recent = $all_recent_model->where('USER_ID', session()->get('ID'))->orderBy('UPDATED_AT', 'DESC')->findAll();

                    if (count($all_recent) >= 11) {
                        $delete_oldest = new RecipeUserRecentLinkModel();
                        $delete_oldest->where('ID', end($all_recent)['ID'])->delete();
                    }
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action after the request
    }
}
