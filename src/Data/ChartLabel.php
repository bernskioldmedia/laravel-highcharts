<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\Makeable;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @method static ChartLabel make(string $label, int|float $x, int|float $y, string $key = '', array $styles = [], array $attributes = [])
 */
class ChartLabel implements Arrayable
{
    use Makeable;

    public function __construct(
        public string $label,
        public int|float $x = 0.0,
        public int|float $y = 0.0,
        public string $key = '',
        public array $styles = [],
        public array $attributes = [],
    )
    {
        $this->key = $this->key ?? str()->random(8);
    }

    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function x(int|float $x): self
    {
        $this->x = (float)$x;

        return $this;
    }

    public function y(int|float $y): self
    {
        $this->y = (float)$y;

        return $this;
    }

    public function coordinates(int|float $x, int|float $y): self
    {
        return $this->x($x)->y($y);
    }

    public function styles(array $styles = []): self
    {
        $this->styles = $styles;

        return $this;
    }

    public function style(string $key, string $value): self
    {
        $this->styles[$key] = $value;

        return $this;
    }

    public function attributes(array $attributes = []): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function attribute(string $key, string $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function toArray()
    {
        return [
            'key' => $this->key,
            'label' => $this->label,
            'x' => $this->x,
            'y' => $this->y,
            'styles' => $this->styles,
            'attributes' => $this->attributes,
        ];
    }
}
