<?php

declare(strict_types=1);

use App\Modules\Auth\Controllers\SignInController;
use App\Modules\Auth\Controllers\SignUpController;
use App\Modules\UrlShort\Controllers\UrlController;
use App\Modules\UrlShort\Models\Url;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->controller(SignUpController::class)->group(function () {
    Route::get('/user/create', 'create')->name('user.signup.create');
    Route::post('/user/create', 'store')->name('user.signup.store');
});

Route::middleware('web')->controller(SignInController::class)->group(function () {
    Route::get('/user/login', 'create')->name('user.signin.create');
    Route::post('/user/login', 'store')->name('user.signin.store');
    Route::delete('/user/{id}/logout', 'destroy')->name('user.signout');
});

Route::middleware('web')->controller(UrlController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/url/create', 'create')->name('url.create');
    Route::post('/url/create', 'store')->name('url.store');
});

Route::get('/short.ly/{slug}', function ($slug) {
    $url = Url::where('slug', $slug)->first();
    if (! isset($url)) {
        abort(404);
    }
    $url->url_visits++;
    $url->save();
    return redirect($url->url_name);
})->name('test');

