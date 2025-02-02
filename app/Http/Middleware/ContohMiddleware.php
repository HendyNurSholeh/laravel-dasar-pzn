<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContohMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $key, string $status): Response
    {
        $apiKey = $request->header('X-API-KEY');
        if ($apiKey !== $key) {
            return response()->json(['message' => 'Unauthorized'], $status);
        }
        return $next($request);
    }
}