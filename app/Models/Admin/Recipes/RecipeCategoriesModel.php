<?php

namespace App\Models\Admin\Recipes;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class RecipeCategoriesModel extends Model
{
    use BlameableTrait;

    protected $table = 'recipe_categories';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'LABEL',
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
}
