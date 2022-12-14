<?php

declare(strict_types=1);

namespace App\Modules\UrlShort\Data;

use App\Modules\UrlShort\Requests\UrlRequest;
use Spatie\LaravelData\Data;

class UrlData extends Data
{
    public function __construct(
        public string $url,
    ) {
    }

    public static function fromRequest(UrlRequest $request): static
    {
        return new static(
            $request->url_name,
        );
    }
}