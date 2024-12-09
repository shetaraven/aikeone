<?php

namespace App\Controllers\Admin\Api\V1;

use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class CategoriesController extends ResourceController
{
    protected $modelName = 'App\Models\Admin\Recipes\RecipeCategoriesModel';
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
        $rc_info = $this->model->find($id);
        if (! $rc_info) {
            return $this->failNotFound('Store not found');
        }

        return $this->respond($rc_info);
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
                'LABEL' => 'required|is_unique[recipe_categories.LABEL]',
            ],
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {
            $insert_data = [
                'LABEL' => $post_data['LABEL'],
                'DESCRIPTION' => $post_data['DESCRIPTION'],
            ];

            $insert_id = $this->model->insert($insert_data);

            if (! $insert_id) {
                return $this->failServerError('Failed to create category record');
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Category created successfully'
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
        $post_data = $this->request->getRawInput();
        $rc_info = $this->model->find($id);
        if (!$rc_info) {
            return $this->failNotFound('Category not found');
        }

        $valid = $this->validate(
            [
                'LABEL' => 'required|is_unique[recipe_categories.LABEL,ID,' . $id . ']',
            ]
        );

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {

            $update_data = [
                'LABEL' => $post_data['LABEL'],
                'DESCRIPTION' => $post_data['DESCRIPTION'],
            ];

            $this->model->update($id, $update_data);

            $db->transCommit();
            return $this->respond(['message' => 'Category updated successfully'], 200);
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
        $rc_info = $this->model->find($id);
        if (!$rc_info) {
            return $this->failNotFound('Category not found');
        }
        $db = Config::connect();
        $db->transStart();
        try {
            $this->model->where('ID', $id)->delete();
            if ($this->model->error()['code']) {
                throw new DatabaseException($this->model->error()['message']);
            }

            $db->transCommit();
            return $this->respond(['message' => 'Category deleted successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
