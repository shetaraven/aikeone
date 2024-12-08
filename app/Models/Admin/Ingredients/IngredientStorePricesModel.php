<?php

namespace App\Models\Admin\Ingredients;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class IngredientStorePricesModel extends Model
{
    protected $table = 'ingredient_store_prices';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'INGREDIENT_ID',
        'STORE_ID',
        'PRICE',
    ];

    public function withStore() {
        $existingSelects = $this->QBSelect ?? ['ingredient_store_prices.*'];

        return $this->select([
            ...$existingSelects,
            'stores.NAME STORE_NAME'
        ])
        ->join('stores', 'ingredient_store_prices.STORE_ID = stores.ID', 'LEFT');
    }
}
