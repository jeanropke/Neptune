<?php

namespace App\Http\Middleware;

use App\Models\CmsSetting;
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
        $maintenance = cms_config('hotel.maintenance');
        if ($maintenance == 1) {
            if (Auth::check()) {
                if (Auth::user()->hasPermission('can_housekeeping')) {
                    return $next($request);
                }
                return redirect('maintenance');
            }
            return redirect('maintenance');
        }
        return $next($request);
    }
}
