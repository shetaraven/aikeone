<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Ingredients\IngredientsModel;
use App\Models\Admin\Recipes\RecipeCategoriesModel;
use App\Models\Admin\Recipes\RecipeCategoryLinkModel;
use App\Models\Admin\Recipes\RecipeIngredientModel;
use App\Models\Admin\Recipes\RecipeInstructionsModel;
use App\Models\Admin\Recipes\RecipesModel;
use Config\Services;

class RecipesController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [
            'assets/admin/js/recipes.js',
        ];
        $this->module_data['menu_list'] = get_menu_list();
    }

    public function list()
    {
        $this->module_data['title'] = 'Recipes List';

        $recipe_model = new RecipesModel();
        $this->module_data['recipe_list'] = $recipe_model->withCreator()->orderBy('CREATED_AT', 'DESC')->paginate(10, 'admin');
        $this->module_data['pager'] = $recipe_model->pager;

        return view('admin/recipes/list',  $this->module_data);
    }

    public function form()
    {
        $request = Services::request();
        $get_data = $request->getGet();
        
        $this->module_data['title'] = isset( $get_data['id'] ) ? 'Update Recipe' : 'Create Recipes';

        $recipe_model = new RecipesModel();
        $this->module_data['recipe_info']       = $recipe_model->emptyForm;
        $this->module_data['recipe_cat_list']   = [];

        $rc_model = new RecipeCategoriesModel();
        $this->module_data['recipe_categories'] = $rc_model->findAll();

        if(  isset( $get_data['id'] ) ) {
            $this->module_data['recipe_info'] = $recipe_model->where('ID', $get_data['id'])->first();

            $inst_model = new RecipeInstructionsModel();
            $this->module_data['instruction_list'] = $inst_model->where('RECIPE_ID', $get_data['id'])->findAll();

            $ingreds_model = new RecipeIngredientModel();
            $this->module_data['ingredients_list'] = $ingreds_model->where('RECIPE_ID', $get_data['id'])->withIngredient()->withUnitMeasure()->findAll();

            $recicat_model = new RecipeCategoryLinkModel();
            $recipe_cat_list = $recicat_model->where('RECIPE_ID', $get_data['id'])->findAll();
            $this->module_data['recipe_cat_list'] = array_column($recipe_cat_list, 'CATEGORY_ID');

            $recipe_img_loc = '/assets/admin/img/recipe_imgs/' . $get_data['id'] . '/main.jpeg';
            
            if( is_file( ROOTPATH . '/public' . $recipe_img_loc) ) {
                $this->module_data['recipe_img'] = $recipe_img_loc;
            }

            // echo '<pre>';
            // print_r( $recipe_img_loc  );
            // echo "\n";
            // die();
        }

        return view('admin/recipes/create',  $this->module_data);
    }

    function partialIngredsList () {
        $ingreds_model = new IngredientsModel();
        $ingredients_list = $ingreds_model->findAll();

        return view('admin/recipes/_template_ingred_list', [
            'ingredients_list' => $ingredients_list
        ]);
    }

    function partialIngredsSet () {
        $request = Services::request();
        $post_data = $request->getPost();
        
        $type_ingred = array_column($post_data['SELECTED_INGREDS'], 'id');
        $type_recipe = [];

        $ingreds_model = new IngredientsModel();
        $ingredients_list = $ingreds_model->whereIn('INGREDIENTS.ID', $type_ingred)->withUnitMeasure()->findAll();

        return view('admin/recipes/_template_ingred_set', [
            'ingredients_list' => $ingredients_list
        ]);
    }
}
