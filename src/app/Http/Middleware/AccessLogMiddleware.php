<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AccessLogMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response
    {
        $response = $next($request);

        $user = auth()->user();

        Log::info('Access Log', [
            'user' => $user?->email ?? 'guest',
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
        ]);

        return $response;
    }
}
