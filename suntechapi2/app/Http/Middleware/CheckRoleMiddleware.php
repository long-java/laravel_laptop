<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $role = Auth::user() -> roles -> first() -> id;
        // if($role ==2){
        //     return response()->view('common.error');
        // }
        // return $next($request);

         // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu roles =1 (admin), status = 1 (actived) --> ( && $user->status == 1)
            if ($user->roles -> first() -> id == 1)      
            {
                return $next($request);
            }
            else if($user->roles -> first() -> id == 2 ){
                // return redirect('/home');
                return response()->view('common.error');
            }
            else
            {
                // Auth::logout();
                return redirect()->route('login');
            }
        } else
            return redirect('/login');
 
    }
}
