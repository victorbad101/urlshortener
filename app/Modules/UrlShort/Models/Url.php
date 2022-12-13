<?php

namespace App\Modules\UrlShort\Models;

use App\Modules\UrlShort\Data\UrlData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public static function register(UrlData $data)
    {
        $url = new static();

        $url->url_name = $data->url;
        $url->url_short = null;
        $url->save();

        return $url;
    }
}
