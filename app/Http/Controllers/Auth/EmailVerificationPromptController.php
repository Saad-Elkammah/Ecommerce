<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Contracts\RoutePrefixInterface;
use App\Contracts\ViewPrefixInterface;
use App\Providers\RouteServiceProvider;

abstract class EmailVerificationPromptController extends Controller implements
    GuardInterface,
    RoutePrefixInterface,
    ViewPrefixInterface
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user($this->getGuard())->hasVerifiedEmail()
                    ? to_route($this->getRoutePrefix() . "home")
                    : view($this->getViewPrefix().'auth.verify-email');
    }
}
