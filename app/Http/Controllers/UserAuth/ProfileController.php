<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Auth\ProfileController as AbstractProfileController;

class ProfileController extends AbstractProfileController
{
    private $viewPrefix="users.";
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
     */
    public function setViewPrefix($viewPrefix)
    {
        $this->viewPrefix = $viewPrefix;

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
     */
    public function setGuard($guard)
    {
        $this->guard = $guard;

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
     */
    public function setRoutePrefix($routePrefix)
    {
        $this->routePrefix = $routePrefix;

    }
}
