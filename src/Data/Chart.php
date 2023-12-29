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
 * @method static self make(?string $key = null)
 */
class Chart implements Arrayable, Jsonable
{
    use Conditionable,
        ConfiguresChartType,
        ConfiguresTooltip,
        ConvertsArrayToJson,
        Dumpable,
        HasOptions,
        Makeable,
        Tappable;

    public string $key;

    public ChartExtras $extras;

    /**
     * @var array<Series>
     */
    public array $series = [];

    public function __construct(string $key = null)
    {
        $this->key = $key ?? str()->random(20);

        $this->extras = new ChartExtras();
        $this->options = config('highcharts.defaults');
    }

    public function key(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function addSeries(Series $series): self
    {
        $this->series[] = $series;

        return $this;
    }

    /**
     * @param  Series[]  $series
     */
    public function series(array $series): self
    {
        $this->series = $series;

        return $this;
    }

    public function extras(callable $callback): self
    {
        $callback($this->extras);

        return $this;
    }

    public function title(string $text): self
    {
        return $this->set('title.text', $text);
    }

    public function subtitle(string $text): self
    {
        return $this->set('subtitle.text', $text);
    }

    public function xAxis(string $title, float|int $min = null, float|int $max = null): self
    {
        $this->set('xAxis.title.text', $title)
            ->set('xAxis.title.enabled', true);

        if ($min !== null) {
            $this->set('xAxis.min', $min);
        }

        if ($max !== null) {
            $this->set('xAxis.max', $max);
        }

        return $this;
    }

    public function withoutXAxisTitle(): self
    {
        $this->set('xAxis.title.enabled', false);

        return $this;
    }

    public function yAxis(string $title, float|int $min = null, float|int $max = null): self
    {
        $this->set('yAxis.title.text', $title)
            ->set('yAxis.title.enabled', true);

        if ($min !== null) {
            $this->set('yAxis.min', $min);
        }

        if ($max !== null) {
            $this->set('yAxis.max', $max);
        }

        return $this;
    }

    public function withoutYAxisTitle(): self
    {
        $this->set('yAxis.title.enabled', false);

        return $this;
    }

    public function credits(string $text, string $url = null): self
    {
        return $this->set('credits.enabled', true)
            ->set('credits.text', $text)
            ->when($url, fn (self $chart) => $chart->set('credits.href', $url));
    }

    public function withoutLegend(): self
    {
        $this->set('legend.enabled', false);

        return $this;
    }

    public function polar(): self
    {
        $this->set('chart.polar', true);

        return $this;
    }

    public function inverted(): self
    {
        $this->set('chart.inverted', true);

        return $this;
    }

    public function height(string $height): self
    {
        $this->set('chart.height', $height);

        return $this;
    }

    public function square(): self
    {
        return $this->height('100%');
    }

    public function backgroundColor(string $color): self
    {
        $this->set('chart.backgroundColor', $color);

        return $this;
    }

    public function caption(string $text): self
    {
        $this->set('caption.text', $text);

        return $this;
    }

    public function styled(): self
    {
        $this->set('chart.styledMode', true);

        return $this;
    }

    public function padding(int $top = null, int $right = null, int $bottom = null, int $left = null): self
    {
        if ($top !== null) {
            $this->set('chart.spacingTop', $top);
        }

        if ($right !== null) {
            $this->set('chart.spacingRight', $right);
        }

        if ($bottom !== null) {
            $this->set('chart.spacingBottom', $bottom);
        }

        if ($left !== null) {
            $this->set('chart.spacingLeft', $left);
        }

        return $this;
    }

    public function margin(int $top = null, int $right = null, int $bottom = null, int $left = null): self
    {
        if ($top !== null) {
            $this->set('chart.marginTop', $top);
        }

        if ($right !== null) {
            $this->set('chart.marginRight', $right);
        }

        if ($bottom !== null) {
            $this->set('chart.marginBottom', $bottom);
        }

        if ($left !== null) {
            $this->set('chart.marginLeft', $left);
        }

        return $this;
    }

    public function withDataLabels(): self
    {
        $this->set('plotOptions.series.dataLabels.enabled', true);

        return $this;
    }

    public function withoutDataLabels(): self
    {
        $this->set('plotOptions.series.dataLabels.enabled', false);

        return $this;
    }

    public function options(): array
    {
        return array_merge(
            config('highcharts.defaults', []),
            config("highcharts.defaultsForType.{$this->type}", []),
            $this->options
        );
    }

    public function chartData(): array
    {
        return array_merge(
            $this->options(),
            [
                'chart' => [
                    'type' => $this->type,
                ],
                'series' => collect($this->series)->toArray(),
            ]
        );
    }

    public function checksum(): string
    {
        return md5($this->toJson());
    }

    public function toArray(): array
    {
        return [
            'chartData' => $this->chartData(),
            'extras' => $this->extras,
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
