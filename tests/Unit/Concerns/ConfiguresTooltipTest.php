<?php

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;

beforeEach(function () {
    $this->testClass = new class
    {
        use ConfiguresTooltip,
            HasOptions;
    };
});

it('can set tooltip values', function () {
    $this->testClass->tooltipValues('Prefix', 'Suffix', 2);

    expect($this->testClass->options())
        ->toBe([
            'tooltip' => [
                'valuePrefix' => 'Prefix',
                'valueSuffix' => 'Suffix',
                'valueDecimals' => 2,
            ],
        ]);
});

it('can set tooltip header', function () {
    $this->testClass->tooltipHeader('Header');

    expect($this->testClass->options())
        ->toBe([
            'tooltip' => [
                'headerFormat' => 'Header',
            ],
        ]);
});

it('can set tooltip point', function () {
    $this->testClass->tooltipPoint('Point');

    expect($this->testClass->options())
        ->toBe([
            'tooltip' => [
                'pointFormat' => 'Point',
            ],
        ]);
});

it('can set tooltip footer', function () {
    $this->testClass->tooltipFooter('Footer');

    expect($this->testClass->options())
        ->toBe([
            'tooltip' => [
                'footerFormat' => 'Footer',
            ],
        ]);
});

it('can set shared tooltip', function () {
    $this->testClass->sharedTooltip();

    expect($this->testClass->options())
        ->toBe([
            'tooltip' => [
                'shared' => true,
            ],
        ]);
});
