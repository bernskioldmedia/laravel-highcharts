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

it('can set the chart type', function () {
    $chart = Chart::make()->type('bar');

    expect($chart->type)->toBe('bar')
        ->and($chart->chartData()['chart']['type'])->toBe('bar');
});

it('can set the X-Axis options', function () {
    $chart = Chart::make()->xAxis(
        title: 'My X-Axis',
        min: 0,
        max: 100
    );

    expect($chart->options()['xAxis']['title']['text'])->toBe('My X-Axis')
        ->and($chart->options()['xAxis']['min'])->toBe(0)
        ->and($chart->options()['xAxis']['max'])->toBe(100);
});

it('can disable the X-Axis title', function () {
    $chart = Chart::make()->withoutXAxisTitle();

    expect($chart->options()['xAxis']['title']['enabled'])->toBeFalse();
});

it('can set the Y-Axis options', function () {
    $chart = Chart::make()->yAxis(
        title: 'My Y-Axis',
        min: 0,
        max: 100
    );

    expect($chart->options()['yAxis']['title']['text'])->toBe('My Y-Axis')
        ->and($chart->options()['yAxis']['min'])->toBe(0)
        ->and($chart->options()['yAxis']['max'])->toBe(100);
});

it('can disable the Y-Axis title', function () {
    $chart = Chart::make()->withoutYAxisTitle();

    expect($chart->options()['yAxis']['title']['enabled'])->toBeFalse();
});

it('can set the chart credits', function () {
    $chart = Chart::make()->credits('My Credits');

    expect($chart->options()['credits']['text'])->toBe('My Credits');
});

it('can set the chart credits with URL', function () {
    $chart = Chart::make()->credits('My Credits', 'https://example.com');

    expect($chart->options()['credits']['text'])->toBe('My Credits')
        ->and($chart->options()['credits']['href'])->toBe('https://example.com');
});

it('can hide the legend', function () {
    $chart = Chart::make()->withoutLegend();

    expect($chart->options()['legend']['enabled'])->toBeFalse();
});

it('can set the chart to be polar', function () {
    $chart = Chart::make()->polar();

    expect($chart->options()['chart']['polar'])->toBeTrue();
});

it('can set the chart to be inverted', function () {
    $chart = Chart::make()->inverted();

    expect($chart->options()['chart']['inverted'])->toBeTrue();
});

it('can set the chart height', function () {
    $chart = Chart::make()->height('100px');

    expect($chart->options()['chart']['height'])->toBe('100px');
});

it('can force the chart to be square', function () {
    $chart = Chart::make()->square();

    expect($chart->options()['chart']['height'])->toBe('100%');
});

it('can set the background color', function () {
    $chart = Chart::make()->backgroundColor('red');

    expect($chart->options()['chart']['backgroundColor'])->toBe('red');
});

it('can set the chart caption', function () {
    $chart = Chart::make()->caption('My Caption');

    expect($chart->options()['caption']['text'])->toBe('My Caption');
});

it('can enable styled mode', function () {
    $chart = Chart::make()->styled();

    expect($chart->options()['chart']['styledMode'])->toBeTrue();
});

it('can set padding', function () {
    $chart = Chart::make()->padding(
        top: 10,
        right: 20,
        bottom: 30,
        left: 40
    );

    expect($chart->options()['chart']['spacingTop'])->toBe(10)
        ->and($chart->options()['chart']['spacingRight'])->toBe(20)
        ->and($chart->options()['chart']['spacingBottom'])->toBe(30)
        ->and($chart->options()['chart']['spacingLeft'])->toBe(40);
});

it('can set margin', function () {
    $chart = Chart::make()->margin(
        top: 10,
        right: 20,
        bottom: 30,
        left: 40
    );

    expect($chart->options()['chart']['marginTop'])->toBe(10)
        ->and($chart->options()['chart']['marginRight'])->toBe(20)
        ->and($chart->options()['chart']['marginBottom'])->toBe(30)
        ->and($chart->options()['chart']['marginLeft'])->toBe(40);
});

it('can enable data labels', function () {
    $chart = Chart::make()->withDataLabels();

    expect($chart->options()['plotOptions']['series']['dataLabels']['enabled'])->toBeTrue();
});

it('can disable data labels', function () {
    $chart = Chart::make()->withoutDataLabels();

    expect($chart->options()['plotOptions']['series']['dataLabels']['enabled'])->toBeFalse();
});

it('can get chart options', function () {
    $chart = Chart::make()->set('chart', 'My Chart');

    expect($chart->options())->toHaveCount(1)
        ->and($chart->options()['chart'])->toBe('My Chart');
});

it('can merge default options', function () {
    config()->set('highcharts.defaults', [
        'chart' => 'Default Chart',
        'title' => [
            'text' => 'Default Title',
        ],
    ]);

    config()->set('highcharts.defaultsForType.bar', [
        'plotOptions' => [
            'bar' => [
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],
        ],
    ]);

    $chart = Chart::make()
        ->bar()
        ->title('My Chart');

    expect($chart->options())->toHaveCount(3)
        ->and($chart->options()['chart'])->toBe('Default Chart')
        ->and($chart->options()['title']['text'])->toBe('My Chart')
        ->and($chart->options()['plotOptions']['bar']['dataLabels']['enabled'])->toBeTrue();
});

it('can get chart data', function () {
    $chart = Chart::make()
        ->bar()
        ->addSeries(Series::make()->data([1, 2, 3]));

    expect($chart->chartData())->toHaveCount(2)
        ->and($chart->chartData()['chart']['type'])->toBe('bar')
        ->and($chart->chartData()['series'])->toHaveCount(1);
});

it('can get a checksum', function () {
    $chart = Chart::make()
        ->bar()
        ->addSeries(Series::make()->data([1, 2, 3]));

    expect($chart->checksum())->toBe('8c6ee64ebdca1d9c0df2713ff2556a23');
});

it('can output to an array', function () {
    $chart = Chart::make()
        ->bar()
        ->addSeries(Series::make()->data([1, 2, 3]));

    expect($chart->toArray())
        ->toHaveCount(2)
        ->toHaveKeys(['chartData', 'extras']);
});

it('can output to JSON', function () {
    $chart = Chart::make()
        ->bar()
        ->addSeries(Series::make()->data([1, 2, 3]));

    expect($chart->toJson())
        ->toBe('{"chartData":{"chart":{"type":"bar"},"series":[{"data":[1,2,3]}]},"extras":{"labels":[],"lines":[],"quadrants":[]}}');
});
