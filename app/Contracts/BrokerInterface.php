<?php
namespace App\Contracts;

interface BrokerInterface
{
    public function getBroker();

    public function setBroker($broker);
}
