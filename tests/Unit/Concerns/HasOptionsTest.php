<?php

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;

beforeEach(function () {
    $this->testClass = new class {
        use HasOptions;
    };
});

it('can set a single option', function () {
    $this->testClass->set('foo', 'bar');

    expect($this->testClass->options())->toBe(['foo' => 'bar']);
});

it('can set many options', function () {
    $this->testClass->setMany([
        'foo' => 'bar',
        'baz' => 'qux',
    ]);

    expect($this->testClass->options())->toBe([
        'foo' => 'bar',
        'baz' => 'qux',
    ]);
});

it('can set a nested option', function () {
    $this->testClass->set('foo.bar', 'baz');

    expect($this->testClass->options())->toBe([
        'foo' => [
            'bar' => 'baz',
        ],
    ]);
});

it('can get all options', function () {
    $this->testClass->setMany([
        'foo' => 'bar',
        'baz' => 'qux',
    ]);

    expect($this->testClass->options())->toBe([
        'foo' => 'bar',
        'baz' => 'qux',
    ]);
});
