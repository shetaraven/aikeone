<?php

namespace App\Models\Client\Users;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class UserFavoritesModel extends Model
{
    use BlameableTrait;

    protected $table = 'STORES';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'USER_ID',
        'RECIPE_ID',
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
