<?php

namespace App\Facade\Providers;

use App\Facade\SmsInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Hisms implements SmsInterface
{
    public function data($number, $message): array
    {
        return [
            'send_sms' => '',
            'username' => config('sms.username'),
            'password' => config('sms.password'),
            'numbers'  => $number,
            'sender'   => config('sms.sender_name'),
            'message'  => $message,
        ];
    }

    public function messages($code): string
    {
        switch ($code)
        {
            case 1: return "إسم المستخدم غير صحيح";
            case 2: return "كلمة المرور غير صحيحة";
            case 404: return "لم يتم إدخال جميع البرامترات المطلوبة";
            case 403: return "تم تجاوز عدد المحاولات المطلوبة";
            case 504: return "الحساب معطل";
            case 4: return "لا يوجد أرقام";
            case 5: return "لا يوجد رسالة";
            case 6: return "سيندر خطئ";
            case 7: return "سيندر غير مفعل";
            case 8: return "الرسالة تحتوي كلمة ممنوعة";
            case 9: return "لا يوجد رصيد";
            case 10: return "صيغة التاريخ خاطئة";
            case 11: return "صيغة الوقت خاطئة";
            default: return "تم الإرسال";
        }
    }

    public function send($number, $message)
    {
        $code = Http::get('https://hisms.ws/api.php', self::data($number, $message))->body();

        $result = ['message' => self::messages($code), 'code' => $code];

        if(in_array((int)$code, self::errors())) Log::info('Hisms', $result['message']);

        return $result;
    }

    public function errors(): array
    {
        return [1, 2, 404, 403, 504, 4, 5, 6, 7, 8, 9, 10, 11];
    }
}
