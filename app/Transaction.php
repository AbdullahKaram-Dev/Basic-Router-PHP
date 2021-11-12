<?php
declare(strict_types=1);

namespace App;


use App\Exception\MissingBillingInfoException;

class Transaction
{
    public Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function process(float $amount):void
    {
        if($amount < 0){

            throw  new \InvalidArgumentException('invalid invoice amount');
        }

        if (empty($this->customer->getBellingInfo())){

            throw new MissingBillingInfoException();
        }

        echo "Processing $" . $amount . ' invoice - ';

        sleep(1);

        echo 'Ok' . PHP_EOL;
    }


}

