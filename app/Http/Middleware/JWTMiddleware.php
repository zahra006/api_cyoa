<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;

use Closure;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $message = '';

        try {
            //check token validation
            JWTAuth::parseToken()->authenticate();
            return $next($request);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $th) {
            //throw $th;
            $message = 'token expired';
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $th) {
            //throw $th;
            $message = 'invalid token';
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $th) {
            //throw $th;
            $message = 'provide token';
        }
        return response()->json([
            'success'=>false,
            'message'=>$message
        ]);
        
    }
}
