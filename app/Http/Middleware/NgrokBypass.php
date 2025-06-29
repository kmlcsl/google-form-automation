<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NgrokBypass
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            str_contains($request->getHost(), 'ngrok') &&
            !$request->has('ngrok-skip-browser-warning') &&
            !$request->ajax()
        ) {

            $url = $request->fullUrl() . '?ngrok-skip-browser-warning=true';
            return redirect($url);
        }

        return $next($request);
    }
}
