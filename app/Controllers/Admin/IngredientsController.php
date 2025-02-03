<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Ingredients\IngredientsModel;
use App\Models\Admin\Ingredients\IngredientStorePricesModel;
use App\Models\Admin\Ingredients\UnitsMeasureModel;
use App\Models\Admin\Stores\StoresModel;

class IngredientsController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [
            'assets/admin/js/ingredients.js'
        ];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function form()
    {
        $this->module_data['title'] = 'Create Ingredient';

        $stores_model = new StoresModel();
        $this->module_data['store_list'] = $stores_model->findAll();

        $units_measure_model = new UnitsMeasureModel();
        $this->module_data['units_measure_list'] = $units_measure_model->findAll();

        return view('admin/ingredients/create',  $this->module_data);
    }

    public function list()
    {
        $request = \Config\Services::request();

        if ($request->getMethod() == 'GET') {
            $this->module_data['title'] = 'Ingredient List';

            $ingreds_model = new IngredientsModel();
            if (session()->get('USER_TYPE_ID') == 2) {
                $ingreds_model->where('CREATED_BY', session()->get('ID'));
            }
            
            $this->module_data['ingredients_list'] = $ingreds_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(10, 'admin');
            $this->module_data['pager'] = $ingreds_model->pager;

            return view('admin/ingredients/list',  $this->module_data);
        } else {
            $post_data = $request->getPost();

            $ingredients_model   = new IngredientsModel();
            $list_count_model = new IngredientsModel();

            if (isset($post_data['search'])) {
                $ingredients_model->like('NAME', $post_data['search']);
                $list_count_model->like('NAME', $post_data['search']);
            }

            if (session()->get('USER_TYPE_ID') == 2) {
                $ingredients_model->where('CREATED_BY', session()->get('ID'));
                $list_count_model->where('CREATED_BY', session()->get('ID'));
            }

            $ingredients_list = $ingredients_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(10, 'admin');

            $table_data = view('admin/ingredients/partials/_table_data',  [
                'ingredients_list' => $ingredients_list
            ]);
            
            $list_count     = $list_count_model->countAllResults();

            return $this->response->setJSON([
                'table_data' => $table_data,
                'pager' => $ingredients_model->pager->makeLinks(1, 5, $list_count, 'admin', 0, 'admin'),
            ]);
        }
    }

    public function partialEditForm()
    {
        $request = \Config\Services::request();
        $post_data = $request->getPost();

        $ingreds_model = new IngredientsModel();
        $this->module_data['ingredient_info'] = $ingreds_model->where('ingredients.ID', $post_data['INGRED_ID'])->withUnitMeasure()->first();

        $isp_model = new IngredientStorePricesModel();
        $this->module_data['ingred_store_prices'] = $isp_model->where(['INGREDIENT_ID' => $this->module_data['ingredient_info']['ID']])->withStore()->findAll();

        $units_measure_model = new UnitsMeasureModel();
        $this->module_data['units_measure_list'] = $units_measure_model->findAll();

        return view('admin/ingredients/partials/_template_edit_ingred', $this->module_data);
    }
}
