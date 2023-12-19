<?php

namespace BernskioldMedia\LaravelHighcharts;

use BernskioldMedia\LaravelHighcharts\Concerns\Livewire\InteractsWithCharts;
use Livewire\Component;

class Chart extends Component
{
    use InteractsWithCharts;

    public Data\Chart $chart;

    public function rendering(): void
    {
        $this->sendChartDataUpdate();
    }

    protected function getChart(): \BernskioldMedia\LaravelHighcharts\Data\Chart
    {
        return $this->chart;
    }
}
