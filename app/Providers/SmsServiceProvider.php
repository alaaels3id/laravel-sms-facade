<?php

namespace App\Providers;

use App\Facade\SmsInterface;
use App\Facade\SmsProcess;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SmsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('Sms', function(){
            return new SmsProcess(app(SmsInterface::class));
        });

        $this->app->bind(SmsInterface::class,'App\\Facade\\Providers\\' . ucwords(Str::camel(config('sms.provider'))));
    }

    public function boot()
    {
        //
    }
}
