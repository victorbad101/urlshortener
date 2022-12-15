<?php

declare(strict_types=1);

namespace App\Modules\UrlShort\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Models\User;
use App\Modules\UrlShort\Data\UrlUpdateData;
use App\Modules\UrlShort\Models\Url;
use App\Modules\UrlShort\Requests\ShortUrlUpdateService;
use App\Modules\UrlShort\Requests\UrlRequest;
use App\Modules\UrlShort\Requests\UrlUpdateRequest;
use App\Modules\UrlShort\Services\ShortUrlCreateService;
use App\Modules\UrlShort\Services\UrlRegisterService;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UrlController extends Controller
{
    public function __construct(
        private UrlRegisterService $registerService,
        private ShortUrlCreateService $createService,
        private ShortUrlUpdateService $updateService
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

    public function show(): View
    {
        $urls = Url::where('user_id', auth()->id())->get();

        return View('url.show', [
            'urls' => $urls
        ]);
    }

    public function edit($id): View
    {
        $url = Url::where('slug', $id)->first();

        return View('url.edit', [
            'url' => $url
        ]);
    }

    public function update($id, UrlUpdateRequest $request)
    {
        $this->updateService->update($id, UrlUpdateData::fromRequest($request));

        return redirect(RouteServiceProvider::HOME);
    }

}