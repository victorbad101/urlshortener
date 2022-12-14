<?php

declare(strict_types=1);

use App\Modules\UrlShort\Controllers\UrlController;
use App\Modules\UrlShort\Models\Url;
use Illuminate\Support\Facades\Route;


Route::middleware('web')->controller(UrlController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/url/create', 'create')->name('url.create');
    Route::post('/url/create', 'store')->name('url.store');
});

Route::get('/short.ly/{slug}', function ($id) {
    $url = Url::find($id);
    return redirect($url->url_name);
})->name('test');

