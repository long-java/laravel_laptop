<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAge
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
        // if($request -> age && $request -> age<18){
        //     // return redirect('error');
        //     return response()->view('common.error');

        // }
        
        // $user = Auth::user();
        // dd($user);

        return $next($request);
    }
}
