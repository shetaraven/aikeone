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
}
