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
        $this->module_data['title'] = 'Ingredient List';

        $ingreds_model = new IngredientsModel();
        $this->module_data['ingredients_list'] = $ingreds_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(10, 'admin');
        $this->module_data['pager'] = $ingreds_model->pager;

        return view('admin/ingredients/list',  $this->module_data);
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

        return view('admin/ingredients/_template_edit_ingred', $this->module_data);
    }
}
