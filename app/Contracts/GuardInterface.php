<?php

namespace App\Contracts;

interface GuardInterface
{
    /**
     * Get the name of the guard.
     *
     * @return string
     */
    public function getGuard();

    /**
     * Set the name of the guard.
     *
     * @param  string  $guardName
     * @return $this
     */
    public function setGuard($guardName);
}
