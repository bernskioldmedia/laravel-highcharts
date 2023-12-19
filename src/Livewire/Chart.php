<?php

namespace BernskioldMedia\LaravelHighcharts\Livewire;

use BernskioldMedia\LaravelHighcharts\Concerns\Livewire\InteractsWithCharts;
use Livewire\Component;
use BernskioldMedia\LaravelHighcharts\Data;

class Chart extends Component
{
    use InteractsWithCharts;

    public Data\Chart $chart;

    protected function getChart(): Data\Chart
    {
        return $this->chart;
    }
}
