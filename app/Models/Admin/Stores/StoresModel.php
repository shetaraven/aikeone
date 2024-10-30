<?php

namespace App\Models\Admin\Stores;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class StoresModel extends Model
{
    use BlameableTrait;

    protected $table = 'STORES';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'NAME',
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

    public function withUser() {
        return $this->select([
            'STORES.*',
            'USERS.GIVEN_NAME as USERNAME'
        ])
        ->join('USERS', 'STORES.CREATED_BY = USERS.ID', 'LEFT');
    }
}
