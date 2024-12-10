<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Ingredients\IngredientsModel;
use App\Models\Admin\Recipes\CategoriesModel;
use App\Models\Admin\Recipes\RecipeCategoryLinkModel;
use App\Models\Admin\Recipes\RecipeIngredientLinkModel;
use App\Models\Admin\Recipes\RecipeInstructionsModel;
use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Admin\Recipes\RecipeSubLinkModel;
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

        $this->module_data['title'] = isset($get_data['id']) ? 'Update Recipe' : 'Create Recipes';

        $recipe_model = new RecipesModel();
        $this->module_data['recipe_info']       = $recipe_model->emptyForm;
        $this->module_data['recipe_cat_list']   = [];

        $rc_model = new CategoriesModel();
        $this->module_data['recipe_categories'] = $rc_model->findAll();

        if (isset($get_data['id'])) {
            $this->module_data['recipe_info'] = $recipe_model->where('ID', $get_data['id'])->first();

            $inst_model = new RecipeInstructionsModel();
            $this->module_data['instruction_list'] = $inst_model->where('RECIPE_ID', $get_data['id'])->findAll();

            $ingreds_model = new RecipeIngredientLinkModel();
            $this->module_data['ingredients_list'] = $ingreds_model->where('RECIPE_ID', $get_data['id'])->withIngredient()->withUnitMeasure()->findAll();

            $rsl_model = new RecipeSubLinkModel();
            $this->module_data['sub_recipe_list'] = $rsl_model->where('RECIPE_ID', $get_data['id'])->withRecipeInfo()->withUnitMeasure()->findAll();

            $recicat_model = new RecipeCategoryLinkModel();
            $recipe_cat_list = $recicat_model->where('RECIPE_ID', $get_data['id'])->findAll();
            $this->module_data['recipe_cat_list'] = array_column($recipe_cat_list, 'CATEGORY_ID');

            $recipe_img_loc = '/assets/admin/img/recipe_imgs/' . $get_data['id'] . '/main.jpeg';

            if (is_file(ROOTPATH . '/public' . $recipe_img_loc)) {
                $this->module_data['recipe_img'] = $recipe_img_loc;
            }

            // echo '<pre>';
            // print_r( $recipe_img_loc  );
            // echo "\n";
            // die();
        }

        return view('admin/recipes/create',  $this->module_data);
    }

    function partialIngredsList()
    {
        $request        = Services::request();
        $post_data      = $request->getPost();
        $ingredients_list   = [];
        $recipe_list        = [];

        # get ingredients not selected
        $ingreds_model = new IngredientsModel();
        $ingredients_list = $ingreds_model;
        if (isset($post_data['SELECTED_INGREDS'])) {
            $type_ingred = array_column($post_data['SELECTED_INGREDS'], 'id');

            $ingredients_list->whereNotIn('ingredients.ID', $type_ingred);
        }

        $ingredients_list = $ingredients_list->withUnitMeasure()->findAll();

        # get recipes not selected
        $recipes_model  = new RecipesModel();
        $recipe_list    = $recipes_model;
        if (isset($post_data['SELECTED_RECIPES'])) {
            $type_recipe = array_column($post_data['SELECTED_RECIPES'], 'id');

            $recipe_list->whereNotIn('recipes.ID', $type_recipe);
        }
        $recipe_list = $recipe_list->findAll();

        return view('admin/recipes/_template_ingred_list', [
            'ingredients_list' => $ingredients_list,
            'recipe_list' => $recipe_list,
        ]);
    }

    function partialIngredsSet()
    {
        $request        = Services::request();
        $post_data      = $request->getPost();
        $ingredients_list   = [];
        $recipe_list        = [];

        if (isset($post_data['SELECTED_INGREDS'])) {
            $type_ingred = array_column($post_data['SELECTED_INGREDS'], 'id');

            $ingreds_model = new IngredientsModel();
            $ingredients_list = $ingreds_model->whereIn('ingredients.ID', $type_ingred)->withUnitMeasure()->findAll();
        }

        if (isset($post_data['SELECTED_RECIPES'])) {
            $type_recipe = array_column($post_data['SELECTED_RECIPES'], 'id');

            $recipes_model = new RecipesModel();
            $recipe_list = $recipes_model->whereIn('recipes.ID', $type_recipe)->findAll();
        }

        return view('admin/recipes/_template_ingred_set', [
            'ingredients_list' => $ingredients_list,
            'recipe_list' => $recipe_list,
        ]);
    }
}
