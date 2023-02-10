<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Auth\ConfirmablePasswordController as AbstractConfirmablePasswordController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends AbstractConfirmablePasswordController
{
    private $viewPrefix="users.auth.";
    private $guard="web";
    private $routePrefix="users.";

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
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view($this->getViewPrefix().'confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        dd($request->user($this->getGuard()));
        if (! Auth::guard($this->getGuard())->validate([
            'email' => $request->user($this->getGuard())->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return to_route($this->getRoutePrefix().'home');
    }



}
