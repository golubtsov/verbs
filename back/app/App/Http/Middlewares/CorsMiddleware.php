<?php

namespace App\Http\Middlewares;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        if (config('app')['env'] === 'local') {
            return $next($request)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        return $next($request);
    }
}
