<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static send(string $number, string $message)
 */
class Sms extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Sms';
    }
}
