<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns\Livewire;

use BernskioldMedia\LaravelHighcharts\Data\Chart;
use function method_exists;

trait InteractsWithCharts
{

    public ?array $cachedChartData = null;

    public ?string $chartKey = null;

    public ?string $chartChecksum = null;

    abstract protected function getChart(): Chart;

    public function mountInteractsWithCharts(): void
    {
        $this->chartKey = $this->getChart()->key;
    }

    protected function getCachedData(): array
    {
        if (empty($this->cachedChartData)) {
            $this->cachedChartData = $this->getChart()->chartData();
        }

        return $this->cachedChartData;
    }

    public function renderingInteractsWithCharts(): void
    {
        $this->sendChartDataUpdate();
    }

    protected function generateChartChecksum(): string
    {
        return md5(json_encode($this->getCachedData()));
    }

    public function sendChartDataUpdate(): void
    {
        $newChecksum = $this->generateChartChecksum();

        if ($newChecksum === $this->chartChecksum) {
            return;
        }

        $this->chartChecksum = $newChecksum;

        // Livewire 3.
        if (method_exists($this, 'dispatch')) {
            $this->dispatch('updateChartData', chartId: $this->getChart()->key, data: $this->getChart()->chartData());

            return;
        }

        // Livewire 2.
        if (method_exists($this, 'emit')) {
            $this->emit('updateChartData', [
                'chartId' => $this->getChart()->key,
                'data' => $this->getChart()->chartData(),
            ]);

            return;
        }
    }
}
