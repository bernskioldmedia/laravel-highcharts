<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns;

trait Makeable
{
    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }
}
