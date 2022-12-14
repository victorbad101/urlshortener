<?php

declare(strict_types=1);

namespace App\Modules\Auth\Data;

use App\Modules\Auth\Requests\SignUpRequest;
use Spatie\LaravelData\Data;

class SignUpData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(SignUpRequest $request): static
    {
        return new static(
            $request->name,
            $request->email,
            $request->password
        );
    }
}