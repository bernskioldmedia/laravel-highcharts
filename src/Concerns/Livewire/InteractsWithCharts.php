<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns\Livewire;

use BernskioldMedia\LaravelHighcharts\Data\Chart;
use Livewire\Attributes\Locked;

trait InteractsWithCharts
{

    #[Locked]
    public ?string $chartKey = null;

    #[Locked]
    public ?string $chartChecksum = null;

    abstract protected function getChart(): Chart;

    public function mountInteractsWithCharts(): void
    {
        $this->chartKey = $this->getChart()->key;
        $this->chartChecksum = $this->getChart()->checksum();
    }

    public function renderingInteractsWithCharts(): void
    {
        $this->chartChecksum = $this->getChart()->checksum();
    }

    public function updatedChartChecksum(): void
    {
        $this->sendChartDataUpdate();
    }

    public function sendChartDataUpdate(): void
    {
        $this->dispatch(
            'updateChartData',
            chartId: $this->getChart()->key,
            data: $this->getChart()->chartData()
        );
    }
}
