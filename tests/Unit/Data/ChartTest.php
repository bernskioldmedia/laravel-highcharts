<?php

use BernskioldMedia\LaravelHighcharts\Data\Chart;
use BernskioldMedia\LaravelHighcharts\Data\Series;

it('can make a chart', function () {
    $chart = Chart::make();

    expect($chart)->toBeInstanceOf(Chart::class);
});

it('can make a chart with a key', function () {
    $chart = Chart::make('my-chart');

    expect($chart->key)->toBe('my-chart');
});

it('can set a key on a chart', function () {
    $chart = Chart::make()->key('my-chart');

    expect($chart->key)->toBe('my-chart');
});

it('can add a series to a chart', function () {
    $series = Series::make();
    $chart = Chart::make()->addSeries($series);

    expect($chart->series)->toHaveCount(1)
        ->and($chart->series[0])->toBe($series);
});

it('can set the chart title', function () {
    $chart = Chart::make()->title('My Chart');

    expect($chart->options()['title']['text'])->toBe('My Chart');
});

it('can set the chart subtitle', function () {
    $chart = Chart::make()->subtitle('My Chart');

    expect($chart->options()['subtitle']['text'])->toBe('My Chart');
});


