<?php
declare(strict_types=1);

namespace App\Modules\UrlShort\Data;

use App\Modules\UrlShort\Requests\UrlUpdateRequest;
use Spatie\LaravelData\Data;

class UrlUpdateData extends Data
{
    public function __construct(
        public string $slug
    ) {
    }

    public static function fromRequest(UrlUpdateRequest $request): static
    {
        return new static(
            $request->slug
        );
    }
}