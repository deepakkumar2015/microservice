<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Deepak Kumar Bastia <deepakkumar.bastia@gmail.com>
 * Class ApiKeyMiddleware
 */
class ApiKeyMiddleware
{
    /**
     * Handle on authorized request
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->get("api_key") || $request->get("api_key") != config("app.key")) {
            return response()->json([
                "message" => "Unauthorized Request",
                "errorCode" => 401
            ], 401);
        }

        return $next($request);
    }
}
