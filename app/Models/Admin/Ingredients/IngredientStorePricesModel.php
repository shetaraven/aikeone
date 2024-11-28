<?php

namespace App\Models\Admin\Ingredients;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class IngredientStorePricesModel extends Model
{
    protected $table = 'INGREDIENT_STORE_PRICES';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'INGREDIENT_ID',
        'STORE_ID',
        'PRICE',
        'VOLUME',
        'UNIT_MEASURE_ID',
    ];

    public function withStore() {
        return $this->select([
            'INGREDIENT_STORE_PRICES.*',
            's.NAME STORE_NAME'
        ])
        ->join('STORES s', 'INGREDIENT_STORE_PRICES.STORE_ID = s.ID', 'LEFT');
    }

    public function withUnitMeasure() {
        $existingSelects = $this->QBSelect ?? [];

        return $this->select([
            ...$existingSelects,
            'um.LABEL UNIT_MEASURE_LABEL'
        ])
        ->join('UNITS_MEASURE um', 'INGREDIENT_STORE_PRICES.UNIT_MEASURE_ID = um.ID', 'LEFT');
    }
}
