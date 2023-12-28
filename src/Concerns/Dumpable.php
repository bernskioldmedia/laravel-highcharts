<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns;

trait Dumpable
{

    public function dd(...$args)
    {
        $this->dump(...$args);

        dd();
    }

    public function dump(...$args)
    {
        dump($this, ...$args);

        return $this;
    }

}
