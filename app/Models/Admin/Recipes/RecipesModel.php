<?php

namespace App\Models\Admin\Recipes;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class RecipesModel extends Model
{
    use BlameableTrait;

    protected $table = 'RECIPES';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'TITLE',
        'DETAILS',
        'VISIBILITY',
        'PREP_TIME',
        'SERVINGS',
        'CREATED_BY',
        'UPDATED_BY',
    ];
    protected $useTimestamps = true;

    public $emptyForm = [
        'ID'            => '',
        'TITLE'         => '',
        'DETAILS'       => '',
        'PREP_TIME'     => '',
        'SERVINGS'      => '',
        'VISIBILITY'    => 1,
    ];

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
            'RECIPES.*',
            'creator.GIVEN_NAME as CREATOR',
            'updator.GIVEN_NAME as UPDATOR'
        ])
        ->join('USERS creator', 'RECIPES.CREATED_BY = creator.ID', 'LEFT')
        ->join('USERS updator', 'RECIPES.CREATED_BY = updator.ID', 'LEFT');
    }
}
