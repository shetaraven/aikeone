<?php

namespace App\Models\Admin\Recipes;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class RecipeIngredientLinkModel extends Model
{
    use BlameableTrait;

    protected $table = 'recipe_ingredient_link';
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
        $existingSelects = $this->QBSelect ?? ['recipe_ingredient_link.*'];

        return $this->select([
            ...$existingSelects,
            'ingredients.NAME',
        ])
        ->join('ingredients', 'recipe_ingredient_link.INGREDIENT_ID = ingredients.ID', 'LEFT');
    }

    public function withUnitMeasure() {
        $existingSelects = $this->QBSelect ?? ['recipe_ingredient_link.*'];

        return $this->select([
            ...$existingSelects,
            'units_measure.LABEL UNIT_MEASURE_LABEL'
        ])
        ->join('units_measure', 'recipe_ingredient_link.UNIT_MEASURE_ID = units_measure.ID', 'LEFT');
    }
}
