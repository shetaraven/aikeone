<?php

namespace App\Controllers\Client\Api\V1;

use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class UserFavoritesController extends ResourceController
{
    protected $modelName = 'App\Models\Client\Users\UserFavoritesModel';
    protected $format = 'json';

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if (! session()->get('GOOGLE_ID')) {
            return $this->failUnauthorized();
        }

        $post_data = $this->request->getPost();
        $valid = $this->validate(
            [
                'RECIPE_ID' => 'required',
            ],
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {
            $insert_data = [
                'USER_ID'   => session()->get('ID') ,
                'RECIPE_ID' => $post_data['RECIPE_ID'],
            ];

            $this->model->insert($insert_data);
            if ($this->model->error()['code']) {
                throw new DatabaseException($this->model->error()['message']);
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Recipe added to collections'
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
        if (! session()->get('GOOGLE_ID')) {
            return $this->failUnauthorized();
        }

        $db = Config::connect();
        $db->transStart();
        try {
            $this->model->where('RECIPE_ID', $id)->where('USER_ID', session()->get('ID'))->delete();

            $db->transCommit();
            return $this->respond(['message' => 'Recipe removed from collection'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
