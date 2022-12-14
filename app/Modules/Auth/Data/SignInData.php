<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\SignInRequest;
use Spatie\LaravelData\Data;

class SignInData extends Data
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(SignInRequest $request): static
    {
        return new static(
            $request->email,
            $request->password
        );
    }
}