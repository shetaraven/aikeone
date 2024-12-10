<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class RecipeSubController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Recipes\RecipeSubLinkModel';
    protected $format = 'json';

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $store_info = $this->model->find($id);
        if (!$store_info) {
            return $this->failNotFound('Item not found');
        }
        $db = Config::connect();
        $db->transStart();
        try {
            $this->model->delete($id);

            $db->transCommit();
            return $this->respond(['message' => 'Recipe ingredient deleted successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
