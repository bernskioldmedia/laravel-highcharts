<?php

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresChartType;

beforeEach(function () {
    $this->testClass = new class {
        use ConfiguresChartType;
    };
});

it('can set the chart type', function () {
    $this->testClass->type('bar');

    expect($this->testClass->type)->toBe('bar');
});
