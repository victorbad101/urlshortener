<?php

namespace App\Modules\UrlShort\Models;

use App\Modules\Auth\Models\User;
use App\Modules\UrlShort\Data\UrlData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Url extends Model
{
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function register(UrlData $data)
    {
        $url = new static();

        $url->user_id = auth()->user()->id;
        $url->url_name = $data->url;
        $url->slug     = '';

        $url->save();

        return $url;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
