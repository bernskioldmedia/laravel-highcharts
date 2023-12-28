<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\Dumpable;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use BernskioldMedia\LaravelHighcharts\Concerns\Makeable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;

/**
 * @method static static make(int|float|null $x = null, int|float|null $y = null, ?string $name = null)
 */
class DataPoint implements Arrayable, Jsonable
{
    use Makeable,
        HasOptions,
        Conditionable,
        Tappable,
        Dumpable,
        ConvertsArrayToJson;

    public function __construct(
        public int|float|null $x = null,
        public int|float|null $y = null,
        public ?string        $name = null,
    )
    {
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

    public function dump(...$args)
    {
        dump(
            $this->toArray(),
            ...$args,
        );

        return $this;
    }
}
