<?php

namespace App\Models\Admin\Recipes;

use App\Models\Traits\BlameableTrait;
use CodeIgniter\Model;

class RecipesModel extends Model
{
    use BlameableTrait;

    protected $table = 'recipes';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
    protected $afterFind = [
        'getMainImage'
    ];
    protected $allowedFields = [
        'TITLE',
        'DETAILS',
        'VISIBILITY',
        'PREP_TIME',
        'SERVINGS',
        'CREATED_BY',
        'UPDATED_BY',
    ];

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

    public function getMainImage(array $data)
    {
        if (isset($data['data'])) {
            if (isset($data['data'][0])) {
                # Multiple rows
                foreach ($data['data'] as &$row) {
                    $row['IMAGE'] = false;
                    $recipe_img_loc = '/assets/admin/img/recipe_imgs/' . $row['ID'] . '/main.jpeg';
                    if (is_file(ROOTPATH . '/public' . $recipe_img_loc)) {
                        $row['IMAGE'] = $recipe_img_loc;
                    }
                }
            } else {
                if (isset($data['data']) && isset($data['data']['ID'])) {
                    # Single row
                    $data['data']['IMAGE'] = false;
                    $recipe_img_loc = '/assets/admin/img/recipe_imgs/' . $data['data']['ID'] . '/main.jpeg';
                    if (is_file(ROOTPATH . '/public' . $recipe_img_loc)) {
                        $data['data']['IMAGE'] = $recipe_img_loc;
                    }
                }
            }
        }

        return $data;
    }

    public function withCreator()
    {
        $existingSelects = $this->QBSelect ?? ['RECIPES.*'];
        return $this->select([
            ...$existingSelects,
            'creator.GIVEN_NAME as CREATOR',
            'updator.GIVEN_NAME as UPDATOR'
        ])
            ->join('users creator', 'RECIPES.CREATED_BY = creator.ID', 'LEFT')
            ->join('users updator', 'RECIPES.CREATED_BY = updator.ID', 'LEFT');
    }
}
