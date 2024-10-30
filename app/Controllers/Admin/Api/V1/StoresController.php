<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class StoresController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Stores\StoresModel';
    protected $format = 'json';

    # list all
    public function index() {}

    #  get one
    public function show($id = null)
    {
        $store_info = $this->model->find($id);
        if (! $store_info) {
            return $this->failNotFound('Store not found');
        }

        return $this->respond($store_info);
    }

    #  create one
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

    #  update one
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

    #  delete one
    public function delete($id = null)
    {
        $store_info = $this->model->find($id);
        if (!$store_info) {
            return $this->failNotFound('Store not found');
        }
        $this->model->delete($id);
        return $this->respondNoContent('Store deleted successfully');
    }
}
