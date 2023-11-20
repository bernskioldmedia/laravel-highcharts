<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;

class DataPoint implements Arrayable, Jsonable
{
    use HasOptions,
        Conditionable,
        Tappable,
        ConvertsArrayToJson;

    public string|null $name = null;

    public int|float|null $x = null;

    public int|float|null $y = null;

    public function __construct(int|float|null $x = null, int|float|null $y = null)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function make(int|float|null $x = null, int|float|null $y = null): self
    {
        return new static($x, $y);
    }

    public function x(int|float|null $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function y(int|float|null $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function toArray(): array
    {
        $options = [];

        if ($this->x) {
            $options['x'] = $this->x;
        }

        if ($this->y) {
            $options['y'] = $this->y;
        }

        if ($this->name) {
            $options['name'] = $this->name;
        }

        return array_merge(
            $options,
            $this->options
        );
    }

}
