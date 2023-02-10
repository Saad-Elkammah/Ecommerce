<?php

namespace App\Contracts;

interface RoutePrefixInterface
{
    /**
     * Get the route prefix.
     *
     * @return string
     */
    public function getRoutePrefix();

    /**
     * Set the route prefix.
     *
     * @param  string  $routePrefix
     * @return $this
     */
    public function setRoutePrefix($routePrefix);
}
