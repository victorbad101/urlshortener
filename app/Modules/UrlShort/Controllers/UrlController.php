<?php

declare(strict_types=1);

namespace App\Modules\UrlShort\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Models\User;
use App\Modules\UrlShort\Models\Url;
use App\Modules\UrlShort\Requests\UrlRequest;
use App\Modules\UrlShort\Services\ShortUrlCreateService;
use App\Modules\UrlShort\Services\UrlRegisterService;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UrlController extends Controller
{
    public function __construct(
        private UrlRegisterService $registerService,
        private ShortUrlCreateService $createService
    ) {
    }

    public function index(): View
    {
        return View('url.index', [
            'urls' => Url::all(),
            'users' => User::all()
        ]);
    }

    public function create(): View
    {
        return View('url.create');
    }

    public function store(UrlRequest $request): RedirectResponse
    {
        $register = $this->registerService->register($request);

        if ($register) {
            $this->createService->create($register->id);
        }

        return redirect(RouteServiceProvider::HOME);
    }

}