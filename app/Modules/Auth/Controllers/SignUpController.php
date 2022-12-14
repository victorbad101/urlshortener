<?php

declare(strict_types=1);

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\SignUpRequest;
use App\Modules\Auth\Services\UserSignUpService\UserSignUpService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SignUpController extends Controller
{
    public function __construct(
        private UserSignUpService $signUpService
    ) {
    }

    public function create(): View
    {
        return View('auth.signUp.create');
    }

    /**
     * @param SignUpRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(SignUpRequest $request): RedirectResponse
    {
        $authUser = $this->signUpService->register($request);

        if ($authUser) {
            auth()->login($authUser);
        } else {
            throw ValidationException::withMessages(['Bad Input']);
        }

        return redirect('/');
    }
}