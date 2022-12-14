<?php

namespace App\Modules\Auth\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Auth\Data\SignUpData;
use App\Modules\UrlShort\Models\Url;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public static function register(SignUpData $data): static
    {
        $user = new static();

        $user->name     = $data->name;
        $user->email    = $data->email;
        $user->password = Hash::make($data->password);

        $user->save();

        return $user;
    }

    public function url(): HasMany
    {
        return $this->hasMany(Url::class);
    }
}
