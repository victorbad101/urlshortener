<?php

declare(strict_types=1);

use App\Modules\UrlShort\Controllers\UrlController;
use Illuminate\Support\Facades\Route;


Route::middleware('web')->controller(UrlController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/url/create', 'create');
    Route::post('/url/create', 'store');
});

