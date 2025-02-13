<?php

namespace App\Models\Admin\Recipes;

use CodeIgniter\Model;

class RecipeCategoryLinkModel extends Model
{

    protected $table = 'recipe_category_link';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'RECIPE_ID',
        'CATEGORY_ID',
    ];

    public function withCategoryInfo()
    {
        $existingSelects = $this->QBSelect ?? ['recipe_category_link.*'];
        return $this->select([
            ...$existingSelects,
            'categories.LABEL'
        ])
            ->join('categories', 'recipe_category_link.CATEGORY_ID = categories.ID', 'LEFT');
    }
}
