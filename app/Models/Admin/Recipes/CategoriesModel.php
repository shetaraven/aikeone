<?php

namespace App\Models\Admin\Recipes;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class CategoriesModel extends Model
{
    use BlameableTrait;

    protected $table = 'categories';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'LABEL',
        'DESCRIPTION',
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

    public function withCreator()
    {
        $existingSelects = $this->QBSelect ?? ['categories.*'];
        return $this->select([
            ...$existingSelects,
            'creator.GIVEN_NAME as CREATOR',
            'updator.GIVEN_NAME as UPDATOR'
        ])
            ->join('users creator', 'categories.CREATED_BY = creator.ID', 'LEFT')
            ->join('users updator', 'categories.CREATED_BY = updator.ID', 'LEFT');
    }
}
