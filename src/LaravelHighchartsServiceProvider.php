<?php

namespace BernskioldMedia\LaravelHighcharts;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class LaravelHighchartsServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        AboutCommand::add('Laravel Highcharts', fn() => ['Version' => '1.0.0']);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'highcharts');

        $this->publishes([
            __DIR__ . '/../config/highcharts.php' => config_path('highcharts.php'),
        ], 'highcharts-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/highcharts'),
        ], 'highcharts-views');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/highcharts.php', 'highcharts'
        );
    }
}
