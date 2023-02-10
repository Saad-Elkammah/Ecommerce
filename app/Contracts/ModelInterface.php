<?php

namespace App\Contracts;

interface ModelInterface
{
    /**
     * Get the model.
     *
     * @return string
     */
    public function getModel();

    /**
     * Set the model.
     *
     * @param  string  $model
     * @return $this
     */
    public function setModel($model);
}
