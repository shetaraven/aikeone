<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class StoresController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Stores\StoresModel';
    protected $format = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
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
        $store_info = $this->model->find($id);
        if (! $store_info) {
            return $this->failNotFound('Store not found');
        }

        return $this->respond($store_info);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $post_data = $this->request->getPost();
        $valid = $this->validate(
            [
                'NAME' => 'required',
            ]
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $insert_data = [
            'NAME' => $post_data['NAME'],
            'COMMENT' => $post_data['COMMENT'],
        ];

        $insert_id = $this->model->insert($insert_data);

        if (! $insert_id) {
            return $this->failServerError('Failed to create store record');
        }

        return $this->respondCreated([], 'Store created successfully');
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
            return $this->failNotFound('Store not found');
        }

        $valid = $this->validate(
            [
                'NAME' => 'required',
            ]
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $update_data = [
            'NAME' => $post_data['NAME'],
            'COMMENT' => $post_data['COMMENT'],
        ];

        $this->model->update($id, $update_data);
        return $this->respond(['message' => 'Store updated successfully'], 200);
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
        $this->model->delete($id);
        return $this->respond(['message' => 'Store deleted successfully'], 200);
    }
}
