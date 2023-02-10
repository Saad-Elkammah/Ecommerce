<?php

namespace App\Http\Controllers\SellerAuth;

use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Contracts\ViewPrefixInterface;
use App\Contracts\RoutePrefixInterface;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AbstractAuthenticatedSessionController;

class AuthenticatedSessionController extends AbstractAuthenticatedSessionController implements
    GuardInterface,
    RoutePrefixInterface,
    ViewPrefixInterface
{
    private $guard = 'seller';
    private $viewPrefix = 'sellers.';
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
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     dd( $credentials);
    //     dd(Auth::guard($this->getGuard())->attempt($credentials));
    //     if (Auth::guard($this->getGuard())->attempt($credentials)) {
    //         // Authentication passed...
    //         return to_route($this->getRoutePrefix() . 'home');
    //     }
    // }

}
