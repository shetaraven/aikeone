<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class IngredientsController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Ingredients\IngredientsModel';
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
        $ingred_info = $this->model->find($id);
        if (! $ingred_info) {
            return $this->failNotFound('Ingredient not found');
        }

        return $this->respond($ingred_info);
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
                'NAME'      => 'required',
                'WEIGHT'    => 'required',
                'CALORIES'  => 'required',
                'FAT'       => 'required',
                'SUGAR'     => 'required',
                'PROTEIN'   => 'required',
                'CARBS'     => 'required',
                'COMMENT'   => 'required',
            ]
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $insert_data = [
            'NAME'      => $post_data['NAME'],
            'WEIGHT'    => $post_data['WEIGHT'],
            'CALORIES'  => $post_data['CALORIES'],
            'FAT'       => $post_data['FAT'],
            'SUGAR'     => $post_data['SUGAR'],
            'PROTEIN'   => $post_data['PROTEIN'],
            'CARBS'     => $post_data['CARBS'],
            'COMMENT'   => $post_data['COMMENT'],
        ];

        $insert_id = $this->model->insert($insert_data);

        if (! $insert_id) {
            return $this->failServerError('Failed to create Ingredient record');
        }

        return $this->respondCreated([], 'Ingredient created successfully');
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
        $ingred_info = $this->model->find($id);
        if (!$ingred_info) {
            return $this->failNotFound('Ingredient not found');
        }

        $valid = $this->validate(
            [
                'NAME'      => 'required',
                'WEIGHT'    => 'required',
                'CALORIES'  => 'required',
                'FAT'       => 'required',
                'SUGAR'     => 'required',
                'PROTEIN'   => 'required',
                'CARBS'     => 'required',
                'COMMENT'   => 'required',
            ]
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $update_data = [
            'NAME'      => $post_data['NAME'],
            'WEIGHT'    => $post_data['WEIGHT'],
            'CALORIES'  => $post_data['CALORIES'],
            'FAT'       => $post_data['FAT'],
            'SUGAR'     => $post_data['SUGAR'],
            'PROTEIN'   => $post_data['PROTEIN'],
            'CARBS'     => $post_data['CARBS'],
            'COMMENT'   => $post_data['COMMENT'],
        ];

        $this->model->update($id, $update_data);
        return $this->respond(['message' => 'Ingredient updated successfully'], 200);
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
        $ingred_info = $this->model->find($id);
        if (!$ingred_info) {
            return $this->failNotFound('Ingredient not found');
        }
        $this->model->delete($id);
        return $this->respond(['message' => 'Ingredient deleted successfully'], 200);
    }
}
