<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\Dumpable;
use BernskioldMedia\LaravelHighcharts\Concerns\Makeable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;

use function collect;
use function dump;

/**
 * @method static static make()
 */
class ChartExtras implements Arrayable, Jsonable
{
    use Conditionable,
        ConvertsArrayToJson,
        Dumpable,
        Makeable,
        Tappable;

    /**
     * @var array<ChartLabel>
     */
    public array $labels = [];

    /**
     * @var array<ChartLine>
     */
    public array $lines = [];

    /**
     * @var array<ChartQuadrant>
     */
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

    public function addQuadrant(ChartQuadrant $quadrant): self
    {
        $this->quadrants[] = $quadrant;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'labels' => collect($this->labels)->toArray(),
            'lines' => collect($this->lines)->toArray(),
            'quadrants' => collect($this->quadrants)->toArray(),
        ];
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
