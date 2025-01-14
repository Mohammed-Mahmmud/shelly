<?php

namespace App\Actions\Users;

use App\Models\User;

class StoreUserAction
{
    public function handle(array $data)
    {
        $user = User::create($data);
        toastr('data has been saved', 'success', 'success');
        return $user;
    }
}
