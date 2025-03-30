<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminGroup
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
        if(Auth::check())
        {
            if (user()->hasPermission('can_access_housekeeping'))
            {
                return $next($request);
            }
            abort(404);
        }

        if (cms_config('site.maintenance.enabled'))
            return redirect('maintenance');

        abort(404);
    }
}
