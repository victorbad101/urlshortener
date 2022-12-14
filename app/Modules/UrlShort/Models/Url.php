<?php

namespace App\Modules\UrlShort\Models;

use App\Modules\UrlShort\Data\UrlData;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function register(UrlData $data)
    {
        $url = new static();

        $url->url_name = $data->url;
        $url->slug     = '';

        $url->save();

        return $url;
    }
}
