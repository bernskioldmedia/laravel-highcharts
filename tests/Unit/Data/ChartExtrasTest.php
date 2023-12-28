<?php

use BernskioldMedia\LaravelHighcharts\Data\ChartExtras;
use BernskioldMedia\LaravelHighcharts\Data\ChartLabel;
use BernskioldMedia\LaravelHighcharts\Data\ChartLine;
use BernskioldMedia\LaravelHighcharts\Data\ChartQuadrant;

it('can add labels', function () {
    $extras = ChartExtras::make()
        ->addLabel(ChartLabel::make('Test Label'));

    expect($extras->labels)->toHaveCount(1);
});

it('can add lines', function () {
    $extras = ChartExtras::make()
        ->addLine(ChartLine::make());

    expect($extras->lines)->toHaveCount(1);
});

it('can add quadrants', function () {
    $extras = ChartExtras::make()
        ->addQuadrant(ChartQuadrant::make());

    expect($extras->quadrants)->toHaveCount(1);
});

it('can be converted to array', function () {
    $extras = ChartExtras::make()
        ->addLabel(ChartLabel::make('Test Label'))
        ->addLine(ChartLine::make())
        ->addQuadrant(ChartQuadrant::make());

    expect($extras->toArray())->toHaveCount(3)
        ->toHaveKeys(['labels', 'lines', 'quadrants'])
        ->and($extras->toArray()['labels'])->toHaveCount(1)
        ->and($extras->toArray()['lines'])->toHaveCount(1)
        ->and($extras->toArray()['quadrants'])->toHaveCount(1);
});
