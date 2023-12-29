<?php

use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;

beforeEach(function () {
    $this->testClass = new class
    {
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
