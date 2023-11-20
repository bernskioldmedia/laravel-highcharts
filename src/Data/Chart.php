<?php

namespace BernskioldMedia\LaravelHighcharts\Data;

use BernskioldMedia\LaravelHighcharts\Concerns\ConfiguresTooltip;
use BernskioldMedia\LaravelHighcharts\Concerns\ConvertsArrayToJson;
use BernskioldMedia\LaravelHighcharts\Concerns\HasOptions;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;

class Chart implements Arrayable, Jsonable
{
    use Conditionable,
        Tappable,
        HasOptions,
        ConfiguresTooltip,
        ConvertsArrayToJson;

    public ChartExtras $extras;

    /**
     * @var array<Series>
     */
    public array $series = [];

    public function __construct()
    {
        $this->extras = new ChartExtras();
    }

    public static function make(...$args): self
    {
        return new self($args);
    }

    public function addSeries(Series $series): self
    {
        $this->series[] = $series;

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

    public function xAxis(string $title, float|int|null $min = null, float|int|null $max = null): self
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

    public function yAxis(string $title, float|int|null $min = null, float|int|null $max = null): self
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

    public function credits(string $text, string $url): self
    {
        return $this->set('credits.enabled', true)
            ->set('credits.text', $text)
            ->set('credits.href', $url);
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

    public function padding(?int $top = null, ?int $right = null, ?int $bottom = null, ?int $left = null): self
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

    public function margin(?int $top = null, ?int $right = null, ?int $bottom = null, ?int $left = null): self
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

    public function type(string $type): self
    {
        $this->set('chart.type', $type);

        return $this;
    }

    public function toArray(): array
    {
        return [
            'options' => $this->options,
            'extras' => $this->extras,
            'data' => $this->series,
        ];
    }
}
