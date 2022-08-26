<?php

namespace App\Providers;

use App\Facade\SmsInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SmsInterface::class,'App\\Facade\\Providers\\' . ucwords(Str::camel(config('sms.provider'))));
    }

    public function boot()
    {
        //
    }
}
