<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns\Livewire;

use BernskioldMedia\LaravelHighcharts\Exceptions\ChartExportException;
use function method_exists;

trait ExportsChart
{

    /**
     * @throws ChartExportException
     */
    public function exportChart(string $type, ?string $chartKey = null, array $exportSettings = [], array $chartOptions = []): void
    {
        if ($chartKey === null && property_exists($this, 'chartKey')) {
            $chartKey = $this->chartKey;
        }

        if ($chartKey === null) {
            throw ChartExportException::missingChartKey();
        }

        if (method_exists($this, 'getChartExportSettings')) {
            $exportSettings = array_merge(
                $this->getChartExportSettings(),
                $exportSettings
            );
        }

        if (method_exists($this, 'getChartOptionsForExport')) {
            $chartOptions = array_merge(
                $this->getChartOptionsForExport(),
                $chartOptions
            );
        }

        // Livewire 3.
        if (method_exists($this, 'dispatch')) {
            $this->dispatch(
                'exportChart',
                chartId: $chartKey,
                type: $type,
                exportSettings: $exportSettings,
                options: $chartOptions,
            );

            return;
        }

        // Livewire 2.
        if (method_exists($this, 'emit')) {
            $this->emit('exportChart', [
                'chartId' => $chartKey,
                'type' => $type,
                'exportSettings' => $exportSettings,
                'options' => $chartOptions,
            ]);
        }
    }
}
