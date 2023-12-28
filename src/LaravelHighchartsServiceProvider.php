<?php

namespace BernskioldMedia\LaravelHighcharts;

use BernskioldMedia\LaravelHighcharts\Components\Chart;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class LaravelHighchartsServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        AboutCommand::add('Laravel Highcharts', fn() => ['Version' => '1.0.0']);

        Blade::component('laravel-highcharts::chart', Chart::class);

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
