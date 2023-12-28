<?php

use BernskioldMedia\LaravelHighcharts\Data\ChartLabel;

it('can create a chart label', function () {
    $label = new ChartLabel('Test Label');

    expect($label->label)->toBe('Test Label');
});

it('can create with all parameters', function () {
    $label = new ChartLabel('Test Label', 1.0, 2.0, 'test', ['width' => '100px'], ['align' => 'center']);

    expect($label)
        ->label->toBe('Test Label')
        ->x->toBe(1.0)
        ->y->toBe(2.0)
        ->key->toBe('test')
        ->styles->toBe(['width' => '100px'])
        ->attributes->toBe(['align' => 'center']);
});

it('can set the label', function () {
    $label = ChartLabel::make('Label')->label('New Label');

    expect($label->label)->toBe('New Label');
});

it('can set the x position', function () {
    $label = ChartLabel::make('Label')->x(1);

    expect($label->x)->toBe(1.0);
});

it('can set the y position', function () {
    $label = ChartLabel::make('Label')->y(1);

    expect($label->y)->toBe(1.0);
});

it('can set both coordinates', function () {
    $label = ChartLabel::make('Label')->coordinates(1, 2);

    expect($label)
        ->x->toBe(1.0)
        ->y->toBe(2.0);
});

it('can set styles', function () {
    $label = ChartLabel::make('Label')->styles(['width' => '100px']);

    expect($label->styles)->toBe(['width' => '100px']);
});

it('can set a single style', function () {
    $label = ChartLabel::make('Label')->style('width', '100px');

    expect($label->styles)->toBe(['width' => '100px']);
});

it('can set attributes', function () {
    $label = ChartLabel::make('Label')->attributes(['align' => 'center']);

    expect($label->attributes)->toBe(['align' => 'center']);
});

it('can set a single attribute', function () {
    $label = ChartLabel::make('Label')->attribute('align', 'center');

    expect($label->attributes)->toBe(['align' => 'center']);
});

it('can output to an array', function () {
    $label = ChartLabel::make(
        label: 'Label',
        x: 1.0,
        y: 2.0,
        key: 'test',
        styles: ['width' => '100px'],
        attributes: ['align' => 'center'],
    );

    expect($label->toArray())->toEqual([
        'key' => 'test',
        'label' => 'Label',
        'x' => 1.0,
        'y' => 2.0,
        'styles' => ['width' => '100px'],
        'attributes' => ['align' => 'center'],
    ]);
});
