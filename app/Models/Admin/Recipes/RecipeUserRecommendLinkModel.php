<?php

namespace App\Models\Admin\Recipes;

use CodeIgniter\Model;

class RecipeUserRecommendLinkModel extends Model
{
    protected $table = 'recipe_user_recommend_link';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'USER_ID',
        'RECIPE_ID',
    ];
}
