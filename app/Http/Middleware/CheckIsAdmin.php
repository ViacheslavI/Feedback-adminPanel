<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
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
        if(Auth::user()->CheckRole()){
           //    dd('checkIsAdmin');
            //return redirect()->route('feedbacks');
            return $next($request);
        }
        else
            abort(403);
        //return $next($request);
    }
}
