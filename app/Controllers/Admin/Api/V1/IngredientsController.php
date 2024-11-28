<?php

namespace App\Controllers\Admin\Api\V1;

use App\Models\Admin\Ingredients\IngredientsModel;
use App\Models\Admin\Ingredients\IngredientStorePricesModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class IngredientsController extends ResourceController
{
    protected $ingredients_model;
    protected $isp_model;
    protected $format = 'json';

    public $response = null;

    public function __construct()
    {
        $this->ingredients_model = new IngredientsModel();
        $this->isp_model = new IngredientStorePricesModel();
    }

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
        $ingred_info = $this->ingredients_model->find($id);
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

        $rules = [
            'NAME'      => 'required|is_unique[INGREDIENTS.NAME]',
            'WEIGHT'    => 'required',
            'CALORIES'  => 'required',
            'FAT'       => 'required',
            'SUGAR'     => 'required',
            'PROTEIN'   => 'required',
            'COMMENT'   => 'required',
            'CARBS'     => 'required',
        ];

        if (isset($post_data['STORE_PRICES'])) {
            foreach ($post_data['STORE_PRICES'] as $key => $price_data) {
                $rules['STORE_PRICES.' . $key . '.price'] = 'required';
                $rules['STORE_PRICES.' . $key . '.volume'] = 'required';
            }
        }

        if (! $this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {
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

            $insert_id = $this->ingredients_model->insert($insert_data);
            if ($insert_id) {
                if (isset($post_data['STORE_PRICES'])) {
                    foreach ($post_data['STORE_PRICES'] as $key => $store_price_data) {
                        $insert_data = [
                            'INGREDIENT_ID'     => $insert_id,
                            'STORE_ID'          => $store_price_data['store_id'],
                            'PRICE'             => $store_price_data['price'],
                            'VOLUME'            => $store_price_data['volume'],
                            'UNIT_MEASURE_ID'   => $store_price_data['unit_measure'],
                        ];
                        $this->isp_model->insert($insert_data);

                        if ($this->isp_model->error()['code']) {
                            throw new DatabaseException($this->isp_model->error()['message']);
                        }
                    }
                }
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Ingredient created successfully'
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
        $ingred_info = $this->ingredients_model->find($id);
        if (!$ingred_info) {
            return $this->failNotFound('Ingredient not found');
        }

        $rules = [
            'ID'        => 'max_length[11]|is_natural_no_zero',
            'NAME'      => 'required|is_unique[INGREDIENTS.NAME,ID,'.$id.']',
            'WEIGHT'    => 'required',
            'CALORIES'  => 'required',
            'FAT'       => 'required',
            'SUGAR'     => 'required',
            'PROTEIN'   => 'required',
            'CARBS'     => 'required',
            'COMMENT'   => 'required',
        ];

        $valid = $this->validate($rules);

        if (isset($post_data['STORE_PRICES'])) {
            foreach ($post_data['STORE_PRICES'] as $key => $price_data) {
                $rules['STORE_PRICES.' . $key . '.price'] = 'required';
                $rules['STORE_PRICES.' . $key . '.volume'] = 'required';
            }
        }

        if (! $valid) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $db = Config::connect();
        $db->transStart();
        try {
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

            $this->ingredients_model->update($id, $update_data);
            if ($this->ingredients_model->error()['code']) {
                throw new DatabaseException($this->ingredients_model->error()['message']);
            }

            foreach ($post_data['STORE_PRICES'] as $key => $price_data) {
                $update_data = [
                    'PRICE' => $price_data['price'],
                    'VOLUME' => $price_data['volume'],
                    'UNIT_MEASURE_ID' => $price_data['unit_measure'],
                ];

                $this->isp_model->update((int)$price_data['id'], $update_data);
                if ($this->isp_model->error()['code']) {
                    print_r($this->isp_model->error());
                    throw new DatabaseException($this->isp_model->error()['message']);
                }
            }

            $db->transComplete();
            return $this->respondCreated([
                'message' => 'Ingredient updated successfully'
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
        $ingred_info = $this->ingredients_model->find($id);
        if (!$ingred_info) {
            return $this->failNotFound('Ingredient not found');
        }
        $db = Config::connect();
        $db->transStart();
        try {
            $this->isp_model->where('INGREDIENT_ID', $id)->delete();
            if ($this->isp_model->error()['code']) {
                throw new DatabaseException($this->isp_model->error()['message']);
            }

            $this->ingredients_model->delete($id);
            if ($this->ingredients_model->error()['code']) {
                throw new DatabaseException($this->ingredients_model->error()['message']);
            }

            $db->transCommit();
            return $this->respond(['message' => 'Ingredient deleted successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            die();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
