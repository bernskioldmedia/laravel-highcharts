<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns\Livewire;

use BernskioldMedia\LaravelHighcharts\Data\Chart;
use function json_encode;
use function md5;
use function method_exists;

trait InteractsWithCharts
{

    public ?array $chartData = null;

    public ?array $chartExtras = null;

    public ?string $chartKey = null;

    public ?string $chartChecksum = null;

    abstract protected function getChart(): Chart;

    public function mountInteractsWithCharts(): void
    {
        $this->chartKey = $this->getChart()->key;
    }

    protected function getCachedData(): array
    {
        if (empty($this->chartData)) {
            $this->chartData = $this->getChart()->chartData();
        }

        if (empty($this->chartExtras)) {
            $this->chartExtras = $this->getChart()->extras->toArray();
        }

        return $this->chartData;
    }

    public function renderingInteractsWithCharts(): void
    {
        $this->sendChartDataUpdate();
    }

    protected function generateChartChecksum(): string
    {
        return md5(json_encode($this->chartData));
    }

    public function sendChartDataUpdate(): void
    {
        $this->getCachedData();

        $newChecksum = $this->generateChartChecksum();

        if ($newChecksum === $this->chartChecksum) {
            return;
        }

        $this->chartChecksum = $newChecksum;

        // Livewire 3.
        if (method_exists($this, 'dispatch')) {
            $this->dispatch(
                'updateChartData',
                chartId: $this->chartKey,
                data: $this->chartData,
                extras: $this->chartExtras,
            );

            return;
        }

        // Livewire 2.
        if (method_exists($this, 'emit')) {
            $this->emit('updateChartData', [
                'chartId' => $this->chartKey,
                'data' => $this->chartData,
                'extras' => $this->chartExtras,
            ]);

            return;
        }
    }
}
