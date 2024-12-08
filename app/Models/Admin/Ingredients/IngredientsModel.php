<?php

namespace App\Models\Admin\Ingredients;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class IngredientsModel extends Model
{
    use BlameableTrait;

    protected $table = 'ingredients';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'NAME',
        'VOLUME',
        'UNIT_MEASURE_ID',
        'WEIGHT',
        'CALORIES',
        'FAT',
        'SUGAR',
        'PROTEIN',
        'CARBS',
        'COMMENT',
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

    public function withCreator() {
        return $this->select([
            'ingredients.*',
            'creator.GIVEN_NAME as CREATOR',
            'updator.GIVEN_NAME as UPDATOR'
        ])
        ->join('users creator', 'ingredients.CREATED_BY = creator.ID', 'LEFT')
        ->join('users updator', 'ingredients.CREATED_BY = updator.ID', 'LEFT');
    }

    public function withUnitMeasure() {
        $existingSelects = $this->QBSelect ?? ['ingredients.*'];

        return $this->select([
            ...$existingSelects,
            'units_measure.LABEL UNIT_MEASURE_LABEL'
        ])
        ->join('units_measure', 'ingredients.UNIT_MEASURE_ID = units_measure.ID', 'LEFT');
    }
}
