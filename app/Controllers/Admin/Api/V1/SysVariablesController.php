<?php

namespace App\Controllers\Admin\Api\V1;

use App\Models\Admin\Dashboard\SysVariablesModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class SysVariablesController extends ResourceController
{
    protected $system_vars_model;
    protected $format = 'json';

    public function __construct()
    {
        $this->system_vars_model = new SysVariablesModel();
    }

    public function updateExhangeRate()
    {
        $post_data = $this->request->getPost();

        $db = Config::connect();
        $db->transStart();
        try {
            $this->system_vars_model->where('LABEL', 'EXCHANGE_RATE')->set(['VALUE' => $post_data['RATE']])->update();

            $db->transCommit();
            return $this->respond(['message' => 'Rate updated successfully'], 200);
        } catch (DatabaseException $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        } catch (Exception $e) {
            $db->transRollback();
            return $this->failServerError($e->getMessage());
        }
    }
}
