<?php

namespace App\Infrastructure\Middleware;
use App\Infrastructure\Response\DistroxResponse;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Http\Request;
class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            return DistroxResponse::error('Unauthorized', [], 401);
        }

        return $next($request);
    }
}
