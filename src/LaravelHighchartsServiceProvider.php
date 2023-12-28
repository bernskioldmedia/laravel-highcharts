<?php

namespace BernskioldMedia\LaravelHighcharts;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class LaravelHighchartsServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        AboutCommand::add('Laravel Highcharts', fn() => ['Version' => '1.0.0']);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-highcharts');

        $this->publishes([
            __DIR__ . '/../config/highcharts.php' => config_path('highcharts.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/highcharts.php', 'highcharts'
        );
    }

}
