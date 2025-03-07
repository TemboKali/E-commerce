<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // ✅ Allow guests to access product details without login
            if ($request->is('client/product/*')) {
                return null; // Do not redirect to login
            }
            return route('admin.login'); // Redirect only when required
        }
    }


}
