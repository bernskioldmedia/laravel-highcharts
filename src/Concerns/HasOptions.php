<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns;

use Illuminate\Support\Arr;

trait HasOptions
{

    public array $options = [];

    public function set(string $key, mixed $value): self
    {
        Arr::set($this->options, $key, $value);

        return $this;
    }

    public function setMany(array $options = []): self
    {
        foreach ($options as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }

}
