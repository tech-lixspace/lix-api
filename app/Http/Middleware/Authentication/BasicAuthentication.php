<?php

namespace App\Http\Middleware\Authentication;

use Closure;

class BasicAuthentication
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
        if($request->getUser() == env('USERNAME_BASIC') && $request->getPassword() == env('PASSWORD_BASIC')){
            return $next($request);
        }else{
            return response()->json(['message'=>'Unauthorized'], 401);
        }
    }
}
