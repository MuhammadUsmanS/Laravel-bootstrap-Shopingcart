<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
            switch ($guard) {
                case 'admin':
                    if (Auth::guard($guard)->check()) // if loggged in as admin guard
                    {
                        return redirect()->route('admin.profile');
                    }
                break;
                
                default:
                    if (Auth::guard($guard)->check()) // if loggged in as admin guard
                    {
                        return redirect()->route('user.login');
                    }
                break;
            
            }
        //     // return redirect(RouteServiceProvider::HOME);
        //     return redirect()->intended(route('user.dashboard'));
        // }




            return $next($request);
    }

}
