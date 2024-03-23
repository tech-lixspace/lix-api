<?php

namespace App\Http\Middleware\Role;

use Closure;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\JWT;
class RoleGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*
    ROLE GUIDE
    1 = Super Admin
    2 = Admin (Branches)
    3 = Chef
    4 = Cashier
    5 = Consumer
    */
    public function handle($request, Closure $next, ... $role)
    {
        $token = $request->bearerToken();
        $credentials = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

        $currentRole = $credentials->data->role;
        
        foreach($role as $r){
            if($r == '1'){
                if($currentRole == 1){
                    return $next($request);
                }
            }else if($r == '2'){
                if($currentRole == 2){
                    return $next($request);
                }
            }else if($r == '3'){
                if($currentRole == 3){
                    return $next($request);
                }
            }else if($r == '4'){
                if($currentRole == 4){
                    return $next($request);
                }
            }else if($r == '5'){
                if($currentRole == 5){
                    return $next($request);
                }
            }
        }
        
        return response()->json([
                        'error' => 'Role unauthorized.'
                        ], 400);
    }
}
