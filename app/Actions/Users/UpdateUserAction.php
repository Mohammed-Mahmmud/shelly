<?php

namespace App\Actions\Users;

use App\Models\User;

class UpdateUserAction
{
    public function handle(User $user, array $data)
    {
        $user->update($data);
        toastr('data has been updated', 'info', 'success');
        return $user;
    }
}
