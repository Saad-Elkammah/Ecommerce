<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Contracts\RoutePrefixInterface;
use App\Providers\RouteServiceProvider;

abstract class EmailVerificationNotificationController extends Controller implements
    GuardInterface,
    RoutePrefixInterface
{
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
