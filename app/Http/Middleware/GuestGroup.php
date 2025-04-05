<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestGroup
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
        $housekeepingPages = ['housekeeping/login', 'housekeeping/account/submit'];
        //if (cms_config('site.maintenance.enabled') && !in_array($request->path(), $housekeepingPages)) {
        //    return redirect('maintenance');
        //}

        if(!Auth::check())
            return $next($request);

        return redirect()->route('index.home');
    }
}
