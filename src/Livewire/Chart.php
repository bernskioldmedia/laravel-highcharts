<?php

namespace BernskioldMedia\LaravelHighcharts;

use Livewire\Component;

class Chart extends Component
{

    public string $chartId;

    public string $height = '400px';

    public bool $alwaysSquare = false;

    public function mount(): void
    {
        $this->chartId = str()->random(20);
    }

}
