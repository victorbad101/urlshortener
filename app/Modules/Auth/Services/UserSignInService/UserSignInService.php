<?php

declare(strict_types=1);

namespace App\Modules\Auth\Services\UserSignInService;

use App\Modules\Auth\Data\SignInData;
use App\Modules\Auth\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserSignInService
{
    /**
     * @param SignInRequest $request
     * @return void
     * @throws ValidationException
     */
    public function login(SignInRequest $request): void
    {
        $collection = SignInData::fromRequest($request)->toArray();

        if (! auth()->attempt($collection)) {
            throw ValidationException::withMessages(['Your provided credentials could not be verified']);
        }

        session()->regenerate();
    }
}