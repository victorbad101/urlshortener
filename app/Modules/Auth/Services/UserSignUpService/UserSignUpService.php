<?php
declare(strict_types=1);

namespace App\Modules\Auth\Services\UserSignUpService;

use App\Modules\Auth\Data\SignUpData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Requests\SignUpRequest;

class UserSignUpService
{
    public function register(SignUpRequest $request): User
    {
        return User::register(SignUpData::fromRequest($request));
    }
}