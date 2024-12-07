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
    ];

    public function withStore() {
        $existingSelects = $this->QBSelect ?? ['INGREDIENT_STORE_PRICES.*'];

        return $this->select([
            ...$existingSelects,
            'STORES.NAME STORE_NAME'
        ])
        ->join('STORES', 'INGREDIENT_STORE_PRICES.STORE_ID = STORES.ID', 'LEFT');
    }
}
