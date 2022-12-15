<?php
declare(strict_types=1);

namespace App\Modules\UrlShort\Requests;

use App\Modules\UrlShort\Data\UrlUpdateData;
use App\Modules\UrlShort\Models\Url;

class ShortUrlUpdateService
{
    public function update($id, UrlUpdateData $data)
    {
        $url = Url::where('slug', $id)->first();

        $url->slug = $data->slug;
        $url->save();

        return $url;
    }
}