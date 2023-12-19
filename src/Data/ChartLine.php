<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\Makeable;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @method static ChartLine make(float|int $x1 = 0.0, float|int $y1 = 0.0, float|int $x2 = 0.0, float|int $y2 = 0.0, array $attributes = [], ?string $key = null)
 */
class ChartLine implements Arrayable
{
    use Makeable;

    public function __construct(
        public float   $x1 = 0.0,
        public float   $y1 = 0.0,
        public float   $x2 = 0.0,
        public float   $y2 = 0.0,
        public array   $attributes = [],
        public ?string $key = null
    )
    {
        $this->key = $this->key ?? str()->random(8);
    }

    public function x1(float|int $x1): self
    {
        $this->x1 = (float)$x1;

        return $this;
    }

    public function y1(float|int $y1): self
    {
        $this->y1 = (float)$y1;

        return $this;
    }

    public function x2(float|int $x2): self
    {
        $this->x2 = (float)$x2;

        return $this;
    }

    public function y2(float|int $y2): self
    {
        $this->y2 = (float)$y2;

        return $this;
    }

    public function from(float|int $x1, float|int $y1): self
    {
        return $this->x1($x1)->y1($y1);
    }

    public function to(float|int $x2, float|int $y2): self
    {
        return $this->x2($x2)->y2($y2);
    }

    public function attributes(array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function attribute(string $key, string $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'x1' => $this->x1,
            'y1' => $this->y1,
            'x2' => $this->x2,
            'y2' => $this->y2,
            'attributes' => $this->attributes,
        ];
    }
}
