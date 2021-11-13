<?php
declare(strict_types=1);

namespace App\Exception;

use Exception;

class MethodNotFoundException extends Exception
{
    protected $message = 'method not valid';
}