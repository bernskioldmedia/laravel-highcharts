<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Series implements Arrayable, Jsonable
{
    use HasOptions,
        ConfiguresTooltip,
        ConvertsArrayToJson;

    public ?string $type = null;

    /**
     * @var array<DataPoint|string|array>
     */
    public array $data = [];

    public function type(string $type): self
    {
        return $this->set('type', $type);
    }

    public function toArray(): array
    {
        return array_merge(
            ['data' => $this->data],
            $this->options
        );
    }
}
