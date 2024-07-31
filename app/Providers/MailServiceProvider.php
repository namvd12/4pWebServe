<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function(){
            $schedule = $this->app->make(Schedule::class);
            // $schedule->command('maintenance:send')->dailyAt('03:00');
            // $schedule->command('maintenance:send')->everyMinute()->withoutOverlapping();
        });
    }
}