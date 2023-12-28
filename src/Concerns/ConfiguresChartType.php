<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns;

use BernskioldMedia\LaravelHighcharts\Enum\ChartTypes;

trait ConfiguresChartType
{
    public ?string $type = null;

    public function type(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function arcdiagram(): self
    {
        return $this->type(ChartTypes::Arcdiagram->value);
    }

    public function area(): self
    {
        return $this->type(ChartTypes::Area->value);
    }

    public function areaRange(): self
    {
        return $this->type(ChartTypes::AreaRange->value);
    }

    public function areaSpline(): self
    {
        return $this->type(ChartTypes::AreaSpline->value);
    }

    public function areaSplineRange(): self
    {
        return $this->type(ChartTypes::AreaSplineRange->value);
    }

    public function bar(): self
    {
        return $this->type(ChartTypes::Bar->value);
    }

    public function bellcurve(): self
    {
        return $this->type(ChartTypes::Bellcurve->value);
    }

    public function boxplot(): self
    {
        return $this->type(ChartTypes::Boxplot->value);
    }

    public function bubble(): self
    {
        return $this->type(ChartTypes::Bubble->value);
    }

    public function bullet(): self
    {
        return $this->type(ChartTypes::Bullet->value);
    }

    public function column(): self
    {
        return $this->type(ChartTypes::Column->value);
    }

    public function columnPyramid(): self
    {
        return $this->type(ChartTypes::ColumnPyramid->value);
    }

    public function columnRange(): self
    {
        return $this->type(ChartTypes::ColumnRange->value);
    }

    public function cylinder(): self
    {
        return $this->type(ChartTypes::Cylinder->value);
    }

    public function dependencyWheel(): self
    {
        return $this->type(ChartTypes::DependencyWheel->value);
    }

    public function errorBar(): self
    {
        return $this->type(ChartTypes::ErrorBar->value);
    }

    public function funnel(): self
    {
        return $this->type(ChartTypes::Funnel->value);
    }

    public function gauge(): self
    {
        return $this->type(ChartTypes::Gauge->value);
    }

    public function heatmap(): self
    {
        return $this->type(ChartTypes::Heatmap->value);
    }

    public function histogram(): self
    {
        return $this->type(ChartTypes::Histogram->value);
    }

    public function item(): self
    {
        return $this->type(ChartTypes::Item->value);
    }

    public function line(): self
    {
        return $this->type(ChartTypes::Line->value);
    }

    public function lollipop(): self
    {
        return $this->type(ChartTypes::Lollipop->value);
    }

    public function networkGraph(): self
    {
        return $this->type(ChartTypes::NetworkGraph->value);
    }

    public function organization(): self
    {
        return $this->type(ChartTypes::Organization->value);
    }

    public function packedBubble(): self
    {
        return $this->type(ChartTypes::PackedBubble->value);
    }

    public function pareto(): self
    {
        return $this->type(ChartTypes::Pareto->value);
    }

    public function pie(): self
    {
        return $this->type(ChartTypes::Pie->value);
    }

    public function polygon(): self
    {
        return $this->type(ChartTypes::Polygon->value);
    }

    public function pyramid(): self
    {
        return $this->type(ChartTypes::Pyramid->value);
    }

    public function pyramid3d(): self
    {
        return $this->type(ChartTypes::Pyramid3d->value);
    }

    public function sankey(): self
    {
        return $this->type(ChartTypes::Sankey->value);
    }

    public function scatter(): self
    {
        return $this->type(ChartTypes::Scatter->value);
    }

    public function scatter3d(): self
    {
        return $this->type(ChartTypes::Scatter3d->value);
    }

    public function solidGauge(): self
    {
        return $this->type(ChartTypes::SolidGauge->value);
    }

    public function spline(): self
    {
        return $this->type(ChartTypes::Spline->value);
    }

    public function streamGraph(): self
    {
        return $this->type(ChartTypes::StreamGraph->value);
    }

    public function sunburst(): self
    {
        return $this->type(ChartTypes::Sunburst->value);
    }

    public function tileMap(): self
    {
        return $this->type(ChartTypes::TileMap->value);
    }

    public function timeline(): self
    {
        return $this->type(ChartTypes::Timeline->value);
    }

    public function treemap(): self
    {
        return $this->type(ChartTypes::Treemap->value);
    }

    public function variablePie(): self
    {
        return $this->type(ChartTypes::VariablePie->value);
    }

    public function variwide(): self
    {
        return $this->type(ChartTypes::Variwide->value);
    }

    public function vector(): self
    {
        return $this->type(ChartTypes::Vector->value);
    }

    public function venn(): self
    {
        return $this->type(ChartTypes::Venn->value);
    }

    public function waterfall(): self
    {
        return $this->type(ChartTypes::Waterfall->value);
    }

    public function windbarb(): self
    {
        return $this->type(ChartTypes::Windbarb->value);
    }

    public function wordCloud(): self
    {
        return $this->type(ChartTypes::WordCloud->value);
    }

    public function xrange(): self
    {
        return $this->type(ChartTypes::Xrange->value);
    }
}
