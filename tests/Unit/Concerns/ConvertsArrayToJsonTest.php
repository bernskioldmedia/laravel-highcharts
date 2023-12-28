<?php

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;

beforeEach(function () {
    $this->testClass = new class {
        use ConvertsArrayToJson;

        public function toArray(): array
        {
            return [
                'foo' => 'bar',
            ];
        }
    };
});

it('can convert to json', function () {
    expect($this->testClass->toJson())->toBe('{"foo":"bar"}');
});
