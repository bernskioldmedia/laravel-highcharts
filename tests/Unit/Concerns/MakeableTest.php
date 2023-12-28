<?php

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use BernskioldMedia\LaravelHighcharts\Concerns\Makeable;

beforeEach(function () {
    $this->testClass = new class {
        use Makeable;

        public function __construct(
            public string $argument = 'default',
        )
        {
        }
    };
});

it('can be instantiated with the make method', function () {
    $instance = $this->testClass::make('argument');

    expect($instance->argument)->toBe('argument');
});
