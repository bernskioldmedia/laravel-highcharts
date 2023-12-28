<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresChartType;
use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\Dumpable;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use BernskioldMedia\LaravelHighcharts\Concerns\Makeable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;
use function dump;

/**
 * @method static self make(array $data = [])
 */
class Series implements Arrayable, Jsonable
{
    use HasOptions,
        Dumpable,
        Makeable,
        Conditionable,
        Tappable,
        ConfiguresTooltip,
        ConfiguresChartType,
        ConvertsArrayToJson;

    /**
     * @var array<DataPoint|string|array>
     */
    public array $data = [];

    /**
     * @param array<DataPoint|string|array> $data
     */
    public function __construct(array $data = [])
    {
        $this->data($data);
    }

    public function withDataLabels(): self
    {
        return $this->set('dataLabels.enabled', true);
    }

    public function withoutDataLabels(): self
    {
        return $this->set('dataLabels.enabled', false);
    }

    /**
     * @param array<DataPoint|string|array> $data
     */
    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function toArray(): array
    {
        $data = $this->options;

        if ($this->data) {
            $data['data'] = collect($this->data)
                ->map(fn($dataPoint) => $dataPoint instanceof DataPoint
                    ? $dataPoint->toArray()
                    : $dataPoint)
                ->toArray();
        }

        if ($this->type) {
            $data['type'] = $this->type;
        }

        return $data;
    }

    public function dump(...$args)
    {
        dump(
            $this->toArray(),
            ...$args,
        );

        return $this;
    }
}
