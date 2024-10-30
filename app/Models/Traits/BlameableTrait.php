<?php

namespace App\Models\Traits;

trait BlameableTrait
{
    protected function setBlameableFields(array $data)
    {
        $user_id = session()->get('ID'); // Assuming you have the user ID stored in the session

        if (empty($data['id'])) {
            $data['CREATED_BY'] = $user_id;
        }

        $data['UPDATED_BY'] = $user_id;

        return $data;
    }
}
