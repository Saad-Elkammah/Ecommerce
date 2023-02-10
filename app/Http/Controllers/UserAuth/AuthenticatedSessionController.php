<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Contracts\ViewPrefixInterface;
use App\Contracts\RoutePrefixInterface;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AbstractAuthenticatedSessionController;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends AbstractAuthenticatedSessionController implements
    GuardInterface,
    RoutePrefixInterface,
    ViewPrefixInterface
{
    private $guard = 'web';
    private $viewPrefix = 'users.auth.';
    private $routePrefix = 'users.';
    #region old code
    /**
     * Display the login view.
     */
    // public function create(): View
    // {
    //     return view('admin.login');
    // }

    // // /**
    // //  * Handle an incoming authentication request.
    // //  */
    // public function store(AdminLoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return to_route('admins.home');
    // }

    /**
     * Destroy an authenticated session.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('admin')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
    #endregion
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
     * Get the value of viewPrefix
     */
    public function getViewPrefix()
    {
        return $this->viewPrefix;
    }

    /**
     * Set the value of viewPrefix
     *
     * @return  self
     */
    public function setViewPrefix($viewPrefix)
    {
        $this->viewPrefix = $viewPrefix;

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


    // override parent method store
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return to_route($this->getRoutePrefix() . "home");
    // }

}
