<?php

namespace App\Models\Admin\Recipes;

use CodeIgniter\Model;

class RecipeUserRecentLinkModel extends Model
{
    protected $table = 'recipe_user_recent_link';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'USER_ID',
        'RECIPE_ID',
        'UPDATED_AT',
    ];
}
