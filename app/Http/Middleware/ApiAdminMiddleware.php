<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_name = $request->headers->get("php-auth-user");
        $user_password = $request->headers->get("php-auth-pw");
        $user = DB::table('users')->where('name', $user_name)->first();
        if($user->role === 1 && Hash::check($user_password, $user->password)){
            return $next($request);
        } else{
            abort(404);
        } 
    }
}
