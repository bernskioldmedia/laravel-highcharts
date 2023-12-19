<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresChartType;
use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * @method static self create(array $data)
 */
class Series implements Arrayable, Jsonable
{
    use HasOptions,
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
        return array_merge(
            ['data' => $this->data],
            ['type' => $this->type],
            $this->options
        );
    }
}
