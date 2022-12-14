<?php
declare(strict_types=1);

namespace App\Modules\Auth\Services\UserSignOutService;

use App\Modules\Auth\Models\User;

class UserSignOutService
{
    public function logout($id): void
    {
        $user = User::find($id);
        auth()->logout($user);
    }
}