<?php

namespace App\Models\Admin\Ingredients;

use CodeIgniter\Model;

class UnitsMeasureModel extends Model
{
    protected $table = 'UNITS_MEASURE';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'ID',
        'LABEL',
    ];
}
