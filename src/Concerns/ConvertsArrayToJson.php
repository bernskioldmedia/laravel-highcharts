<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns;

use function json_encode;

trait ConvertsArrayToJson
{
    public function toJson($options = 0): false|string
    {
        return json_encode($this->toArray(), $options);
    }
}
