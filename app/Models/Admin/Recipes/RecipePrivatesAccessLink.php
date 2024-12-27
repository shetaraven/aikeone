<?php

namespace App\Models\Admin\Recipes;

use CodeIgniter\Model;

class RecipePrivatesAccessLink extends Model
{
    protected $table = 'recipe_privates_access_link';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'USER_ID',
        'RECIPE_ID',
    ];
}
