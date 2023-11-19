<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use function collect;

class ChartExtras implements Arrayable, Jsonable
{
    use ConvertsArrayToJson;

    /**
     * @var array<ChartLabel>
     */
    public array $labels = [];

    /**
     * @var array<ChartLine>
     */
    public array $lines = [];

    public array $quadrants = [];

    public function addLabel(ChartLabel $label): self
    {
        $this->labels[] = $label;

        return $this;
    }

    public function addLine(ChartLine $line): self
    {
        $this->lines[] = $line;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'labels' => collect($this->labels)->toArray(),
            'lines' => collect($this->lines)->toArray(),
        ];
    }

}
