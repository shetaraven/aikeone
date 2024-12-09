<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class UsersController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Users\UsersModel';
    protected $format = 'json';

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $user_info = $this->model->find($id);
        if (! $user_info) {
            return $this->failNotFound('User not found');
        }

        return $this->respond($user_info);
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
        $store_info = $this->model->find($id);
        if (!$store_info) {
            return $this->failNotFound('User not found');
        }

        $valid = $this->validate(
            [
                'USER_TYPE_ID' => 'required',
            ]
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {

            $update_data = [
                'USER_TYPE_ID' => $post_data['USER_TYPE_ID'],
            ];

            $this->model->update($id, $update_data);

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
            return $this->failNotFound('Store not found');
        }
        $db = Config::connect();
        $db->transStart();
        try {
            $this->model->update($id, ['ACTIVE' => 0]);

            $db->transCommit();
            return $this->respond(['message' => 'Store deleted successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
