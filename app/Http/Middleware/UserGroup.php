<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserGroup
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
        if (cms_config('site.maintenance.enabled')) {
            if (Auth::check()) {
                if (user()->hasPermission('can_access_housekeeping')) {
                    return $next($request);
                }
                return redirect('maintenance');
            }
            return redirect('maintenance');
        }
        return $next($request);
    }
}
