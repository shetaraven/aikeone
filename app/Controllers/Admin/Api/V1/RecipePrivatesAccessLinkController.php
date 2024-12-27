<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class RecipePrivatesAccessLinkController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Recipes\RecipePrivatesAccessLink';
    protected $format = 'json';

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $post_data = $this->request->getPost();

        $db = Config::connect();
        $db->transStart();
        try {
            $insert_data = [
                'USER_ID' => $post_data['USER_ID'],
                'RECIPE_ID' => $post_data['PRIV_RECIPE_ID'],
            ];

            $insert_id = $this->model->insert($insert_data);

            if (! $insert_id) {
                return $this->failServerError('Failed to record');
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Linked created successfully'
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
        $uprl_info = $this->model->find($id);
        if (!$uprl_info) {
            return $this->failNotFound('User not found');
        }
        
        $db = Config::connect();
        $db->transStart();
        try {
            $this->model->where('ID', $id)->delete();
            if ($this->model->error()['code']) {
                throw new DatabaseException($this->model->error()['message']);
            }

            $db->transCommit();
            return $this->respond(['message' => 'Unlinked successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
