<?php

declare(strict_types=1);

namespace App\Modules\UrlShort\Services;

use App\Modules\UrlShort\Models\Url;

class ShortUrlCreateService
{
    public function create($id): Url
    {
        $url = Url::find($id);

        $url->slug = $this->downloadCode(3);
        $url->save();

        return $url;
    }

    private function downloadCode(int $length): string
    {
        $words   = substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm'), 0, $length);
        $numbers = substr(str_shuffle('1234567890'), 0, $length);

        return $words . $numbers;
    }
}