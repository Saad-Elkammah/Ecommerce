<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;

class VerifyAdmin
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
        // if ($request->user('admin') &&
        //     ! ($request->user('admin') instanceof MustVerifyEmail &&
        //     ! $request->user('admin')->hasVerifiedEmail())) {
        //     // return $next($request);
        //     return Redirect::route('admins.verification.notice');
        // }

        // return $request->expectsJson()
        //             ? abort(403, 'Your email address is not verified.')
        //             : Redirect::route('admins.verification.notice');
            // dd($request->user('admin') ||
            // ($request->user('admin') instanceof MustVerifyEmail &&
            // ! $request->user('admin')->hasVerifiedEmail()));
            // dd($request->user('admin') instanceof MustVerifyEmail &&
            // ! $request->user('admin')->hasVerifiedEmail());
            // if($request->user('admin') instanceof MustVerifyEmail &&
            // ! $request->user('admin')->hasVerifiedEmail()) {
            //     return to_route('admins.verification.notice');
            // }
            // return redirect()->route('admins.home');
                //     if ($request->user('admin') ||
                //     ($request->user('admin') instanceof MustVerifyEmail &&
                //     ! $request->user('admin')->hasVerifiedEmail())) {
                //         return to_route('admins.verification.notice');
                //     // return $request->expectsJson()
                //     //         ? abort(403, 'Your email address is not verified.')
                //     //         : Redirect::guest(route('admins.verification.notice'));
                // }
            // return to_route('admins.home');
            //     return $request->expectsJson()
            //                 ? abort(403, 'Your email address is not verified.')
            //                 : Redirect::guest(route('admins.verification.notice'));

                    if($request->user('admin')->email_verified_at == null) {
                        return to_route('admins.verification.notice');
                    }
                    return $next($request);

            dd($request->user('admin') instanceof MustVerifyEmail &&
             $request->user('admin')->hasVerifiedEmail());
                if ($request->user('admin') instanceof MustVerifyEmail &&
                 $request->user('admin')->hasVerifiedEmail()) {
                    return $next($request);
                }
                return to_route('admins.verification.notice');
                // return $request->expectsJson()
                //         ? abort(403, 'Your email address is not verified.')
                //         : Redirect::guest(route('admins.verification.notice'));

    }
}
