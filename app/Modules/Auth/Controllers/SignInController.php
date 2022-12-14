<?php

declare(strict_types=1);

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\SignInRequest;
use App\Modules\Auth\Services\UserSignInService\UserSignInService;
use App\Modules\Auth\Services\UserSignOutService\UserSignOutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SignInController extends Controller
{
    public function __construct(
        private UserSignInService $signInService,
        private UserSignOutService $signOutService
    ) {
    }

    public function create(): View
    {
        return View('auth.signIn.create');
    }

    /**
     * @param SignInRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(SignInRequest $request): RedirectResponse
    {
        $this->signInService->login($request);

        return redirect('/');
    }

    public function destroy($id): RedirectResponse
    {
        $this->signOutService->logout($id);

        return redirect('/');
    }
}