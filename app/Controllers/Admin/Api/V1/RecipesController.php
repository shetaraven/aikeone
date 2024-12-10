<?php

namespace App\Controllers\Admin\Api\V1;

use App\Models\Admin\Recipes\CategoriesModel;
use App\Models\Admin\Recipes\RecipeCategoryLinkModel;
use App\Models\Admin\Recipes\RecipeIngredientLinkModel;
use App\Models\Admin\Recipes\RecipeInstructionsModel;
use App\Models\Admin\Recipes\RecipesModel;
use App\Models\Admin\Recipes\RecipeSubLinkModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class RecipesController extends ResourceController
{

    protected $recipe_model;
    protected $rcl_model;
    protected $rinst_model;
    protected $ringred_model;
    protected $rs_model;
    protected $format = 'json';

    public function __construct()
    {
        $this->recipe_model = new RecipesModel();
        $this->rcl_model = new RecipeCategoryLinkModel();
        $this->rinst_model = new RecipeInstructionsModel();
        $this->ringred_model = new RecipeIngredientLinkModel();
        $this->rs_model = new RecipeSubLinkModel();
    }
    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $post_data = $this->request->getPost();

        $rules = [
            'TITLE' => 'required|is_unique[recipes.TITLE]',
            'DETAILS' => 'required',
            'VISIBILITY' => 'required',
            'TIME' => 'required',
            'SERVINGS' => 'required',
        ];

        if (! $this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {
            $insert_data = [
                'TITLE' => $post_data['TITLE'],
                'DETAILS' => $post_data['DETAILS'],
                'VISIBILITY' => (int)$post_data['VISIBILITY'],
                'PREP_TIME' => $post_data['TIME'],
                'SERVINGS' => $post_data['SERVINGS'],
            ];

            $recipe_id = $this->recipe_model->insert($insert_data);
            if ($this->recipe_model->error()['code']) {
                throw new DatabaseException($this->recipe_model->error()['message']);
            }

            if ($recipe_id) {
                $recipe_image = $this->request->getFile('IMAGE');
                if ($recipe_image && $recipe_image->isValid() && !$recipe_image->hasMoved()) {
                    $recipe_img_loc = '/public/assets/admin/img/recipe_imgs/' . $recipe_id;
                    $recipe_img_loc = ROOTPATH . $recipe_img_loc;

                    if (!is_dir($recipe_img_loc)) {
                        mkdir($recipe_img_loc, 0777, true);
                    }

                    $recipe_image->move($recipe_img_loc, 'main.jpeg');
                }

                if (isset($post_data['CATEGORIES'])) {
                    foreach ($post_data['CATEGORIES'] as $c_key => $categ_id) {
                        $new_rcl = [
                            'RECIPE_ID' => $recipe_id,
                            'CATEGORY_ID' => $categ_id,
                        ];

                        $this->rcl_model->insert($new_rcl);
                        if ($this->rcl_model->error()['code']) {
                            throw new DatabaseException($this->rcl_model->error()['message']);
                        }
                    }
                }

                if (isset($post_data['INSTRUCTIONS'])) {
                    foreach ($post_data['INSTRUCTIONS'] as $s_key => $instruction_data) {
                        $instruction_data = json_decode($instruction_data, true);
                        $new_ri = [
                            'RECIPE_ID' => $recipe_id,
                            'ORDER' => $instruction_data['ORDER'],
                            'DESCRIPTION' => $instruction_data['INSTRUCTION'],
                        ];

                        $this->rinst_model->insert($new_ri);
                        if ($this->rinst_model->error()['code']) {
                            throw new DatabaseException($this->rinst_model->error()['message']);
                        }
                    }
                }

                if (isset($post_data['INGREDIENTS'])) {
                    foreach ($post_data['INGREDIENTS'] as $s_key => $ingredient) {
                        $ingredient = json_decode($ingredient, true);

                        if ($ingredient['TYPE'] == 0) {
                            $new_ringed = [
                                'RECIPE_ID' => $recipe_id,
                                'INGREDIENT_ID' => $ingredient['INGRED_ID'],
                                'VOLUME' => $ingredient['VOLUME'],
                                'UNIT_MEASURE_ID' => $ingredient['UNIT_MEASURE_ID'],
                            ];

                            $this->ringred_model->insert($new_ringed);
                            if ($this->ringred_model->error()['code']) {
                                throw new DatabaseException($this->ringred_model->error()['message']);
                            }
                        } else {
                            $new_ringed = [
                                'RECIPE_ID' => $recipe_id,
                                'SUB_RECIPE_ID' => $ingredient['INGRED_ID'],
                                'VOLUME' => $ingredient['VOLUME'],
                                'UNIT_MEASURE_ID' => $ingredient['UNIT_MEASURE_ID'],
                            ];

                            $this->rs_model->insert($new_ringed);
                            if ($this->rs_model->error()['code']) {
                                throw new DatabaseException($this->rs_model->error()['message']);
                            }
                        }
                    }
                }
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Recipe created successfully'
            ]);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $post_data = $this->request->getPost();
        $recipe_image = $this->request->getFile('IMAGE');

        $rules = [
            'TITLE' => 'required|is_unique[recipes.TITLE,ID,' . $id . ']',
            'DETAILS' => 'required',
            'VISIBILITY' => 'required',
            'TIME' => 'required',
            'SERVINGS' => 'required',
        ];

        if (! $this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {
            $update_data = [
                'TITLE' => $post_data['TITLE'],
                'DETAILS' => $post_data['DETAILS'],
                'VISIBILITY' => $post_data['VISIBILITY'],
                'PREP_TIME' => $post_data['TIME'],
                'SERVINGS' => $post_data['SERVINGS'],
            ];

            $recipe_id = $this->recipe_model->update($id, $update_data);
            if ($this->recipe_model->error()['code']) {
                throw new DatabaseException($this->recipe_model->error()['message']);
            }

            if ($recipe_id) {
                $recipe_image = $this->request->getFile('IMAGE');
                if ($recipe_image && $recipe_image->isValid() && !$recipe_image->hasMoved()) {
                    $recipe_img_loc = '/public/assets/admin/img/recipe_imgs/' . $recipe_id;
                    $recipe_img_loc = ROOTPATH . $recipe_img_loc;

                    if (!is_dir($recipe_img_loc)) {
                        mkdir($recipe_img_loc, 0777, true);
                    }

                    $recipe_image->move($recipe_img_loc, 'main.jpeg');
                }

                if (isset($post_data['CATEGORIES'])) {
                    # check existing category links
                    $existing_rcls = $this->rcl_model->where('RECIPE_ID', $id)->findAll();
                    $existing_rcls = array_column($existing_rcls, 'CATEGORY_ID');

                    # check what to remove
                    $to_remove = array_diff($existing_rcls, $post_data['CATEGORIES']);
                    foreach ($to_remove as $c_key => $remove_id) {
                        $this->rcl_model->where('RECIPE_ID', $id)->where('CATEGORY_ID', $remove_id)->delete();
                        if ($this->rcl_model->error()['code']) {
                            throw new DatabaseException($this->rcl_model->error()['message']);
                        }
                    }

                    # check what to add
                    $to_add = array_diff($post_data['CATEGORIES'], $existing_rcls);
                    foreach ($to_add as $c_key => $add_id) {
                        $new_rcl = [
                            'RECIPE_ID' => $id,
                            'CATEGORY_ID' => $add_id,
                        ];

                        $this->rcl_model->insert($new_rcl);
                        if ($this->rcl_model->error()['code']) {
                            throw new DatabaseException($this->rcl_model->error()['message']);
                        }
                    }
                } else {
                    $this->rcl_model->where('RECIPE_ID', $id)->delete();
                    if ($this->rcl_model->error()['code']) {
                        throw new DatabaseException($this->rcl_model->error()['message']);
                    }
                }

                if (isset($post_data['INSTRUCTIONS'])) {

                    foreach ($post_data['INSTRUCTIONS'] as $s_key => $instruction_data) {
                        $instruction_data = json_decode($instruction_data, true);
                        $inst_order_exists = $this->rinst_model->where('RECIPE_ID', $id)->where('ORDER', $instruction_data['ORDER'])->first();
                        # check if order num exists
                        if ($inst_order_exists) {
                            $update_ri = [
                                'DESCRIPTION' => $instruction_data['INSTRUCTION'],
                            ];

                            $this->rinst_model->update($inst_order_exists['ID'], $update_ri);
                        } else {
                            $new_ri = [
                                'RECIPE_ID' => $id,
                                'ORDER' => $instruction_data['ORDER'],
                                'DESCRIPTION' => $instruction_data['INSTRUCTION'],
                            ];

                            $this->rinst_model->insert($new_ri);
                        }

                        if ($this->rinst_model->error()['code']) {
                            throw new DatabaseException($this->rinst_model->error()['message']);
                        }
                    }
                }

                if (isset($post_data['INGREDIENTS'])) {
                    foreach ($post_data['INGREDIENTS'] as $s_key => $ingredient) {
                        $ingredient = json_decode($ingredient, true);
                        if (isset($ingredient['ID'])) {
                            $update_ingred = [
                                'VOLUME' => $ingredient['VOLUME'],
                            ];
                            if ($ingredient['TYPE'] == 0) {
                                $this->ringred_model->update($ingredient['ID'], $update_ingred);
                            } else {
                                $this->rs_model->update($ingredient['ID'], $update_ingred);
                            }
                        } else {
                            if ($ingredient['TYPE'] == 0) {
                                $new_inged = [
                                    'RECIPE_ID' => $id,
                                    'INGREDIENT_ID' => $ingredient['INGRED_ID'],
                                    'VOLUME' => $ingredient['VOLUME'],
                                    'UNIT_MEASURE_ID' => $ingredient['UNIT_MEASURE_ID'],
                                ];

                                $this->ringred_model->insert($new_inged);
                            } else {
                                $new_ringed = [
                                    'RECIPE_ID' => $id,
                                    'SUB_RECIPE_ID' => $ingredient['INGRED_ID'],
                                    'VOLUME' => $ingredient['VOLUME'],
                                    'UNIT_MEASURE_ID' => $ingredient['UNIT_MEASURE_ID'],
                                ];

                                $this->rs_model->insert($new_ringed);
                            }
                        }

                        if ($this->ringred_model->error()['code']) {
                            throw new DatabaseException($this->ringred_model->error()['message']);
                        }

                        if ($this->rs_model->error()['code']) {
                            throw new DatabaseException($this->rs_model->error()['message']);
                        }
                    }
                } else {
                    $this->ringred_model->where('RECIPE_ID', $id)->delete();
                    if ($this->ringred_model->error()['code']) {
                        throw new DatabaseException($this->ringred_model->error()['message']);
                    }
                }
            }

            $db->transComplete();
            // $db->transRollback();
            return $this->respondCreated([
                'message' => 'Recipe updated successfully'
            ]);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $db = Config::connect();
        $db->transStart();
        try {

            $this->rcl_model->where('RECIPE_ID', $id)->delete();
            if ($this->rcl_model->error()['code']) {
                throw new DatabaseException($this->rcl_model->error()['message']);
            }

            $this->rinst_model->where('RECIPE_ID', $id)->delete();
            if ($this->rinst_model->error()['code']) {
                throw new DatabaseException($this->rinst_model->error()['message']);
            }

            $this->ringred_model->where('RECIPE_ID', $id)->delete();
            if ($this->ringred_model->error()['code']) {
                throw new DatabaseException($this->ringred_model->error()['message']);
            }

            $this->recipe_model->where('ID', $id)->delete();
            if ($this->recipe_model->error()['code']) {
                throw new DatabaseException($this->recipe_model->error()['message']);
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Recipe deleted'
            ]);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
