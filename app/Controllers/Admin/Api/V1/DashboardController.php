<?php

namespace App\Controllers\Admin\Api\V1;

use App\Models\Admin\Recipes\RecipesModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class DashboardController extends ResourceController
{
    protected $recipes_model;
    protected $format = 'json';

    public function __construct()
    {
        $this->recipes_model = new RecipesModel();
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
        $post_data = $this->request->getRawInput();

        $db = Config::connect();
        $db->transStart();
        try {
            
            $featured_recipe = $this->recipes_model->where('FEATURED', $post_data['ORDER'])->first();

            # remove existing featured on order
            $update_data = [
                'FEATURED' => 0,
            ];

            $this->recipes_model->update($featured_recipe['ID'], $update_data);

            # set new featured on order
            $update_data = [
                'FEATURED' => $post_data['ORDER'],
            ];

            $this->recipes_model->update($post_data['RECIPE_ID'], $update_data);

            $db->transCommit();
            return $this->respond(['message' => 'User updated successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
