<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use Illuminate\Contracts\Support\Arrayable;

class ChartLabel implements Arrayable
{

    public string $key;

    public string $label;

    public float $x = 0.0;

    public float $y = 0.0;

    public array $styles = [];

    public array $attributes = [];

    public function __construct(string $label, int|float $x, int|float $y, string $key = '', array $styles = [])
    {
        $this->key = $key ?? str()->random(8);
        $this->label = $label;
        $this->x = $x;
        $this->y = $y;
        $this->styles = $styles;
    }

    public static function make(string $label, int|float $x, int|float $y, string $key = '', array $styles = []): self
    {
        return new self($label, $x, $y, $key, $styles);
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
