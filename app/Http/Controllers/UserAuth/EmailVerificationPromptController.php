<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Auth\EmailVerificationPromptController as AbstractEmailVerificationPromptController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends AbstractEmailVerificationPromptController
{
    private $guard = 'web';
    private $routePrefix = 'users.';
    private $viewPrefix = 'users.';


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
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user($this->getGuard())->hasVerifiedEmail()
                    ? to_route($this->getRoutePrefix() . "home")
                    : view($this->getViewPrefix() . "auth.verify-email");
    }
}
