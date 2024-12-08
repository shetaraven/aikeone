<?php

namespace App\Models\Admin\Ingredients;

use CodeIgniter\Model;

class UnitsMeasureModel extends Model
{
    protected $table = 'units_measure';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'ID',
        'LABEL',
    ];
}
