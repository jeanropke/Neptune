<?php

namespace App\Http\Middleware;

use Closure;

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
        return $next($request);
    }
}
