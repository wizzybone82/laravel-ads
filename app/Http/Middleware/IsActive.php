<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsActive
{
    public function handle($request, Closure $next)
    {
     
        
        if($request->user() && auth()->user()->is_admin != 1 && auth()->user()->active_status == 0){
            auth()->logout();
            return abort(403, 'Your status is not active anymore.');
        }
        return $next($request);
    }
}
