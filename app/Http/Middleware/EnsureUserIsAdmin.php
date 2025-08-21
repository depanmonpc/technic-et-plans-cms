<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
{
    \Log::info('AUTH CHECK', [
        'auth' => auth()->check(),
        'user' => auth()->user()?->email,
        'is_admin' => auth()->user()?->is_admin,
    ]);

    if (!auth()->check() || !auth()->user()->is_admin) {
        abort(403);
    }

    return $next($request);
}
}