<?php

namespace App\Facade;

class SmsProcess
{
    public $sms;

    public function __construct(SmsInterface $sms)
    {
        $this->sms = $sms;
    }

    public function send($number, $message)
    {
        $numbers = is_array($number) ? implode(',', $number) : $number;

        return $this->sms->send($numbers, $message);
    }
}
