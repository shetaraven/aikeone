<?php

namespace App\Models\Admin\Recipes;

use CodeIgniter\Model;

class RecipeCategoryLinkModel extends Model
{

    protected $table = 'RECIPE_CATEGORY_LINK';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'RECIPE_ID',
        'CATEGORY_ID',
    ];

    public function withCategoryInfo()
    {
        $existingSelects = $this->QBSelect ?? ['RECIPE_CATEGORY_LINK.*'];
        return $this->select([
            ...$existingSelects,
            'RECIPE_CATEGORIES.LABEL'
        ])
            ->join('RECIPE_CATEGORIES', 'RECIPE_CATEGORY_LINK.CATEGORY_ID = RECIPE_CATEGORIES.ID', 'LEFT');
    }
}
