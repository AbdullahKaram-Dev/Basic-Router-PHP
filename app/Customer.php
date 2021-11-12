<?php

namespace App;

class Customer
{
    private array $billingInfo;

    public function __construct($billingInfo = [1,2,3])
    {
        $this->billingInfo = $billingInfo;
    }

    public function getBellingInfo(): array
    {
        return $this->billingInfo;
    }
}