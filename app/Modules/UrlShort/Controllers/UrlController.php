<?php

declare(strict_types=1);

namespace App\Modules\UrlShort\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\UrlShort\Models\Url;
use App\Modules\UrlShort\Requests\UrlRequest;
use App\Modules\UrlShort\Services\UrlRegisterService;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UrlController extends Controller
{
    public function __construct(
        private UrlRegisterService $registerService
    ) {
    }

    public function index(): View
    {
        return View('url.index', [
            'urls' => Url::all()
        ]);
    }

    public function create(): View
    {
        return View('url.create');
    }

    public function store(UrlRequest $request): RedirectResponse
    {
        $this->registerService->register($request);

        return redirect(RouteServiceProvider::HOME);
    }
}