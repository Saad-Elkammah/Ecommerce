<?php

namespace App\Http\Controllers\SellerAuth;

use App\Http\Controllers\Auth\EmailVerificationNotificationController as AbstractEmailVerificationNotificationController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends AbstractEmailVerificationNotificationController
{
    private $guard = 'seller';
    private $routePrefix = 'sellers.';


    /**
     * Get the value of guard
     */
    public function getGuard()
    {
        return $this->guard;
    }

    /**
     * Set the value of guard
     *
     * @return  self
     */
    public function setGuard($guard)
    {
        $this->guard = $guard;

        return $this;
    }

    /**
     * Get the value of routePrefix
     */
    public function getRoutePrefix()
    {
        return $this->routePrefix;
    }

    /**
     * Set the value of routePrefix
     *
     * @return  self
     */
    public function setRoutePrefix($routePrefix)
    {
        $this->routePrefix = $routePrefix;

        return $this;
    }
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user($this->getGuard())->hasVerifiedEmail()) {
            return to_route($this->getRoutePrefix() . "home");
        }

        $request->user($this->getGuard())->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
