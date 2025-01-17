<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Admin\Ingredients\IngredientsModel;
use App\Models\Admin\Ingredients\IngredientStorePricesModel;
use App\Models\Admin\Recipes\RecipeCategoryLinkModel;
use App\Models\Admin\Recipes\RecipeIngredientLinkModel;
use App\Models\Admin\Recipes\RecipeInstructionsModel;
use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Client\Users\UserFavoritesModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class RecipesController extends BaseController
{
    public function __construct()
    {
        $this->module_data['css'] = [];
        $this->module_data['js'] = [];
    }

    public function index()
    {
        $this->module_data['title'] = 'Recipes';
        $this->module_data['css']   = ['/assets/main/css/all-recipe.css'];
        $this->module_data['js']    = [];

        $recipe_model = new RecipesModel();
        $this->module_data['recipe_list'] = $recipe_model->withPrivateRecipes()->orderBy('CREATED_AT', 'DESC')->paginate(8, 'client');
        $this->module_data['pager'] = $recipe_model->pager;

        $this->module_data['user_favs'] = [];
        if( session()->get('ID') ) {
            $user_favs_model = new UserFavoritesModel();
            $user_fav_list = $user_favs_model->where('USER_ID', session()->get('ID') )->findAll();
            $this->module_data['user_favs'] = array_column($user_fav_list, 'RECIPE_ID');
        }

        return view('client/recipe/index',  $this->module_data);
    }

    public function details()
    {
        $this->module_data['title'] = 'Recipe Details';
        $this->module_data['css'] = ['/assets/main/css/details.css'];
        $this->module_data['js'] = [
            '/assets/client/js/recipes.js',
            '/assets/client/js/common_functions.js',
        ];

        $request = Services::request();
        $get_data = $request->getGet();

        $recipe_model = new RecipesModel();
        $this->module_data['recipe_info'] = $recipe_model->where('ID', $get_data['id'])->first();

        if( ! $this->module_data['recipe_info'] ) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rcl_model = new RecipeCategoryLinkModel();
        $this->module_data['recipe_categories'] = $rcl_model->where('RECIPE_ID', $get_data['id'])->withCategoryInfo()->findAll();

        $ril_model = new RecipeIngredientLinkModel();
        $this->module_data['recipe_ingredients'] = $ril_model->where('RECIPE_ID', $get_data['id'])->withIngredient()->withUnitMeasure()->findAll();

        $ri_model = new RecipeInstructionsModel();
        $this->module_data['recipe_instructions'] = $ri_model->where('RECIPE_ID', $get_data['id'])->orderBy('ORDER', 'ASC')->findAll();

        $this->module_data['is_favorite'] = false;

        if (session()->get('GOOGLE_ID')) {
            $uf_model = new UserFavoritesModel();
            $this->module_data['is_favorite'] = $uf_model->where('RECIPE_ID', $get_data['id'])->where('USER_ID', session()->get('ID'))->find() ? true : false;
        }

        return view('client/recipe/details',  $this->module_data);
    }

    public function partailIngredCalc($rid)
    {
        $stores_used = [];

        $ril_model = new RecipeIngredientLinkModel();
        $recipe_ingredients = $ril_model->where('RECIPE_ID', $rid)->withIngredient()->withUnitMeasure()->findAll();

        $isp_model = new IngredientStorePricesModel();
        foreach ($recipe_ingredients as $key => &$ri_info) {
            $ri_info['STORE_PRICES'] = [];

            $prices = $isp_model->where('INGREDIENT_ID', $ri_info['INGREDIENT_ID'])->withStore()->findAll();
            foreach ($prices as $key => $price_info) {
                $stores_used[$price_info['STORE_ID']] = [
                    'STORE_ID' => $price_info['STORE_ID'],
                    'STORE_NAME' => $price_info['STORE_NAME'],
                ];

                $ri_info['STORE_PRICES'][$price_info['STORE_ID']] = $price_info['PRICE'];
            }
        }

        $html_content = view('client/recipe/partials/_ingred_prices', [
            'stores_used' => $stores_used,
            'recipe_ingredients' => $recipe_ingredients,
        ]);

        $orig_ingreds_model = new IngredientsModel();
        $orig_ingreds = $orig_ingreds_model->whereIn('ingredients.ID', array_column($recipe_ingredients, 'INGREDIENT_ID'))->withUnitMeasure()->findAll();

        return json_res('success', [
            'html_content' => $html_content,
            'recipe_ingredients' => $recipe_ingredients,
            'orig_ingreds' => $orig_ingreds,
        ]);
    }

    public function partailNutriVals($rid)
    {
        $ril_model = new RecipeIngredientLinkModel();
        $recipe_ingredients = $ril_model->where('RECIPE_ID', $rid)->withIngredient()->withUnitMeasure()->findAll();

        $ingredient_ids = array_column($recipe_ingredients, 'INGREDIENT_ID');
        $ingred_model = new IngredientsModel();
        $ingredients_list = $ingred_model->whereIn('ID', $ingredient_ids)->findAll();

        $html_content = view('client/recipe/partials/_nutri_vals', [
            'recipe_ingredients' => $recipe_ingredients
        ]);

        return json_res('success', [
            'html_content' => $html_content,
            'recipe_ingredients' => $recipe_ingredients,
            'ingredients_list' => $ingredients_list,
        ]);
    }

    public function partailServingCalc($rid)
    {
        $ril_model = new RecipeIngredientLinkModel();
        $recipe_ingredients = $ril_model->where('RECIPE_ID', $rid)->withIngredient()->withUnitMeasure()->findAll();

        $html_content = view('client/recipe/partials/_serving_calc', [
            'recipe_ingredients' => $recipe_ingredients
        ]);

        return json_res('success', [
            'html_content' => $html_content,
            'recipe_ingredients' => $recipe_ingredients,
        ]);
    }
}
