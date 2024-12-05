<?php

namespace App\Models\Admin\Recipes;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class RecipeIngredientModel extends Model
{
    use BlameableTrait;

    protected $table = 'RECIPE_INGREDIENTS';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'RECIPE_ID',
        'INGREDIENT_ID',
        'VOLUME',
        'UNIT_MEASURE_ID',
        'CREATED_BY',
        'UPDATED_BY',
    ];
    protected $useTimestamps = true;

    public function insert($row = null, $returnID = true)
    {
        // Prepare the data with blameable fields
        $row = $this->setBlameableFields($row);

        // Call the parent insert method
        return parent::insert($row, $returnID);
    }

    public function update($id = null, $row = null): bool
    {
        // Prepare the row with blameable fields
        $row = $this->setBlameableFields($row);

        // Call the parent update method
        return parent::update($id, $row);
    }

    public function withIngredient() {
        $existingSelects = $this->QBSelect ?? ['RECIPE_INGREDIENTS.*'];

        return $this->select([
            ...$existingSelects,
            'i.NAME'
        ])
        ->join('INGREDIENTS i', 'RECIPE_INGREDIENTS.INGREDIENT_ID = i.ID', 'LEFT');
    }

    public function withUnitMeasure() {
        $existingSelects = $this->QBSelect ?? ['RECIPE_INGREDIENTS.*'];

        return $this->select([
            ...$existingSelects,
            'um.LABEL UNIT_MEASURE_LABEL'
        ])
        ->join('UNITS_MEASURE um', 'RECIPE_INGREDIENTS.UNIT_MEASURE_ID = um.ID', 'LEFT');
    }
}
