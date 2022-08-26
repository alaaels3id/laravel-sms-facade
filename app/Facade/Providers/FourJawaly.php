<?php

namespace App\Facade\Providers;

use App\Facade\SmsInterface;

class FourJawaly implements SmsInterface
{
    public function data($number, $message): array
    {
        return [];
    }

    public function messages($code): string
    {
        return 'Done';
    }

    public function send($number, $message)
    {
        dd('four_jawaly');
    }

    public function errors(): array
    {
        return [];
    }
}
