<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCustomer
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
        if(auth()->user()->is_admin == 3){
            return $next($request);
        }
        return redirect()->back()->with('error',"You don't have customer access permission.");
        // return redirect()->route('home3')->with('error',"You don't have customer access.");
       
    }
}
