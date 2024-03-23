<?php

namespace App\Http\Middleware\Authentication;

use Closure;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\JWT;
class JWTAuthentication
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
        // return $next($request);
        $token = $request->bearerToken();
        
        if(!$token) {
            // jika token tidak ada maka langsung kembalikan error dengan kode 401
            return response()->json([
                'error' => 'Unauthorized.'
            ], 401);
        }

        $key = env('JWT_SECRET');

        try {
            $credentials = JWT::decode($token, new Key($key, 'HS256'));
        } catch(ExpiredException $e) {
            return response()->json([
            'error' => 'Provided token is expired.'
            ], 400);
        } catch(SignatureInvalidException $e){
            return response()->json([
            'error' => 'Wrong signature token or secret key.'
            ], 400);
        } catch(Exception $e) {
            return response()->json([
            'error' => 'An error while decoding token.'
            ], 400);
        }
        
        return $next($request);
    }
}
