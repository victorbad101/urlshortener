<?php
declare(strict_types=1);

namespace App\Modules\UrlShort\Services;

use App\Modules\UrlShort\Data\UrlData;
use App\Modules\UrlShort\Models\Url;
use App\Modules\UrlShort\Requests\UrlRequest;

class UrlRegisterService
{
    public function register(UrlRequest $request): Url
    {
        return Url::register(UrlData::fromRequest($request));
    }
}