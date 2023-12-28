<?php

use BernskioldMedia\LaravelHighcharts\Data\ChartQuadrant;

it('can make a chart quadrant', function () {
    $quadrant = ChartQuadrant::make(
        x1: 1,
        y1: 2,
        x2: 3,
        y2: 4,
        attributes: ['foo' => 'bar'],
        key: 'baz',
    );

    expect($quadrant)
        ->x1->toBe(1)
        ->y1->toBe(2)
        ->x2->toBe(3)
        ->y2->toBe(4)
        ->attributes->toBe(['foo' => 'bar'])
        ->key->toBe('baz');
});

it('can set x1', function () {
    $quadrant = ChartQuadrant::make()->x1(1);

    expect($quadrant)->x1->toBe(1.0);
});

it('can set y1', function () {
    $quadrant = ChartQuadrant::make()->y1(1);

    expect($quadrant)->y1->toBe(1.0);
});

it('can set x2', function () {
    $quadrant = ChartQuadrant::make()->x2(1);

    expect($quadrant)->x2->toBe(1.0);
});

it('can set y2', function () {
    $quadrant = ChartQuadrant::make()->y2(1);

    expect($quadrant)->y2->toBe(1.0);
});

it('can set from', function () {
    $quadrant = ChartQuadrant::make()->from(1, 2);

    expect($quadrant)->x1->toBe(1.0)
        ->y1->toBe(2.0);
});

it('can set to', function () {
    $quadrant = ChartQuadrant::make()->to(1, 2);

    expect($quadrant)->x2->toBe(1.0)
        ->y2->toBe(2.0);
});

it('can set attributes', function () {
    $quadrant = ChartQuadrant::make()->attributes(['foo' => 'bar']);

    expect($quadrant)->attributes->toBe(['foo' => 'bar']);
});

it('can set singular attribute', function () {
    $quadrant = ChartQuadrant::make()->attribute('foo', 'bar');

    expect($quadrant)->attributes->toBe(['foo' => 'bar']);
});

it('can output as array', function () {
    $quadrant = ChartQuadrant::make(
        x1: 1.0,
        y1: 2.0,
        x2: 3.0,
        y2: 4.0,
        attributes: ['foo' => 'bar'],
        key: 'baz',
    );

    expect($quadrant->toArray())->toBe([
        'key' => 'baz',
        'x1' => 1.0,
        'y1' => 2.0,
        'x2' => 3.0,
        'y2' => 4.0,
        'attributes' => ['foo' => 'bar'],
    ]);
});
