<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAgreements
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

        // // check agreement
        // $account = Auth::user();
        // if(in_array("202204_nda",json_decode($account->agreements))) {
        //     return $next($request);
        // } else {
        //     return redirect("/nda?agree=false");
        // }
        
        return $next($request);
    }
}
