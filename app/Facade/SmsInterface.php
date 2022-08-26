<?php

namespace App\Facade;

interface SmsInterface
{
    public function data($number, $message): array;

    public function messages($code): string;

    public function send($number, $message);

    public function errors(): array;
}
