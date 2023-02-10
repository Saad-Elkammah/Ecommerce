<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Contracts\ViewPrefixInterface;
use App\Contracts\RoutePrefixInterface;
use App\Http\Requests\Auth\LoginRequest;

abstract class AuthenticatedSessionController extends Controller implements
    GuardInterface,
    RoutePrefixInterface,
    ViewPrefixInterface
{

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view($this->getViewPrefix() . "login");
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate($this->getGuard());

        $request->session()->regenerate();

        return to_route($this->getRoutePrefix()."home");
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard($this->getGuard())->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route($this->getRoutePrefix() . "login");
    }
}
