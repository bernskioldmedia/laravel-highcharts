<?php

use BernskioldMedia\LaravelHighcharts\Data\ChartLine;

it('can make a line', function () {
    $line = ChartLine::make(
        x1: 1.0,
        y1: 2.0,
        x2: 3.0,
        y2: 4.0,
        attributes: ['foo' => 'bar'],
        key: 'baz'
    );

    expect($line)
        ->x1->toBe(1.0)
        ->y1->toBe(2.0)
        ->x2->toBe(3.0)
        ->y2->toBe(4.0)
        ->attributes->toBe(['foo' => 'bar'])
        ->key->toBe('baz');
});

it('can set x1', function () {
    $line = ChartLine::make()->x1(1.0);

    expect($line)->x1->toBe(1.0);
});

it('can set y1', function () {
    $line = ChartLine::make()->y1(1.0);

    expect($line)->y1->toBe(1.0);
});

it('can set x2', function () {
    $line = ChartLine::make()->x2(1.0);

    expect($line)->x2->toBe(1.0);
});

it('can set y2', function () {
    $line = ChartLine::make()->y2(1.0);

    expect($line)->y2->toBe(1.0);
});

it('can set from', function () {
    $line = ChartLine::make()->from(1.0, 2.0);

    expect($line)->x1->toBe(1.0)
        ->y1->toBe(2.0);
});

it('can set to', function () {
    $line = ChartLine::make()->to(1.0, 2.0);

    expect($line)->x2->toBe(1.0)
        ->y2->toBe(2.0);
});

it('can set attributes', function () {
    $line = ChartLine::make()->attributes(['foo' => 'bar']);

    expect($line)->attributes->toBe(['foo' => 'bar']);
});

it('can set a singular attribute', function () {
    $line = ChartLine::make()->attribute('foo', 'bar');

    expect($line)->attributes->toBe(['foo' => 'bar']);
});

it('can return an array', function () {
    $line = ChartLine::make(
        x1: 1.0,
        y1: 2.0,
        x2: 3.0,
        y2: 4.0,
        attributes: ['foo' => 'bar'],
        key: 'baz'
    );

    expect($line->toArray())->toBe([
        'key' => 'baz',
        'x1' => 1.0,
        'y1' => 2.0,
        'x2' => 3.0,
        'y2' => 4.0,
        'attributes' => ['foo' => 'bar'],
    ]);
});
