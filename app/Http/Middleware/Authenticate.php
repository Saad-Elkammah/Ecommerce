<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard = null)
    {
        if (! $request->expectsJson()) {
            if($request->is('admin/*')){
                return route('admins.login');
            }
            elseif($request->is('user/*')){
                return route('users.login');
            }
            elseif($request->is('sellers/*')){
                return route('sellers.login');
            }
        }

    }
}
