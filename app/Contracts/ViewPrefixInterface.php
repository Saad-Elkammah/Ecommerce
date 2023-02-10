<?php

namespace App\Contracts;

interface ViewPrefixInterface
{
    /**
     * Get the view prefix.
     *
     * @return string
     */
    public function getViewPrefix();

    /**
     * Set the view prefix.
     *
     * @param  string  $viewPrefix
     * @return $this
     */
    public function setViewPrefix($viewPrefix);
}
