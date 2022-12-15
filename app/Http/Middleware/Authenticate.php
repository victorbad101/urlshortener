<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Validation\ValidationException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! auth()->check()) {
            throw ValidationException::withMessages(['You are not logged in']);
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
