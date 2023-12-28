<?php

use BernskioldMedia\LaravelHighcharts\Data\DataPoint;

it('can be created', function () {
    $dataPoint = DataPoint::make(
        x: 1,
        y: 2,
        name: 'test'
    );

    expect($dataPoint)
        ->toHaveProperty('x', 1)
        ->toHaveProperty('y', 2)
        ->toHaveProperty('name', 'test');
});

it('can set x', function () {
    $dataPoint = DataPoint::make()
        ->x(1);

    expect($dataPoint)
        ->toHaveProperty('x', 1);
});

it('can set y', function () {
    $dataPoint = DataPoint::make()
        ->y(1);

    expect($dataPoint)
        ->toHaveProperty('y', 1);
});

it('can set name', function () {
    $dataPoint = DataPoint::make()
        ->name('test');

    expect($dataPoint)
        ->toHaveProperty('name', 'test');
});

it('can be converted to array', function () {
    $dataPoint = DataPoint::make(
        x: 1,
        y: 2,
        name: 'test'
    );

    expect($dataPoint->toArray())->toEqual([
        'x' => 1,
        'y' => 2,
        'name' => 'test',
    ]);
});

it('can merge options', function () {
    $dataPoint = DataPoint::make()
        ->x(1.0)
        ->y(2.0)
        ->set('foo', 'bar');

    expect($dataPoint->toArray())->toEqual([
        'x' => 1.0,
        'y' => 2.0,
        'foo' => 'bar',
    ]);
});
