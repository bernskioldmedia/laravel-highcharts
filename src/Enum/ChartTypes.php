<?php

namespace BernskioldMedia\LaravelHighcharts\Enum;

enum ChartTypes: string
{
    case Arcdiagram = 'arcdiagram';
    case Area = 'area';
    case AreaRange = 'arearange';
    case AreaSpline = 'areaspline';
    case AreaSplineRange = 'areasplinerange';
    case Bar = 'bar';
    case Bellcurve = 'bellcurve';
    case Boxplot = 'boxplot';
    case Bubble = 'bubble';
    case Bullet = 'bullet';
    case Column = 'column';
    case ColumnPyramid = 'columnpyramid';
    case ColumnRange = 'columnrange';
    case Cylinder = 'cylinder';
    case DependencyWheel = 'dependencywheel';
    case ErrorBar = 'errorbar';
    case Funnel = 'funnel';
    case Gauge = 'gauge';
    case Heatmap = 'heatmap';
    case Histogram = 'histogram';
    case Item = 'item';
    case Line = 'line';
    case Lollipop = 'lollipop';
    case NetworkGraph = 'networkgraph';
    case Organization = 'organization';
    case PackedBubble = 'packedbubble';
    case Pareto = 'pareto';
    case Pie = 'pie';
    case Polygon = 'polygon';
    case Pyramid = 'pyramid';
    case Pyramid3d = 'pyramid3d';
    case Sankey = 'sankey';
    case Scatter = 'scatter';
    case Scatter3d = 'scatter3d';
    case SolidGauge = 'solidgauge';
    case Spline = 'spline';
    case StreamGraph = 'streamgraph';
    case Sunburst = 'sunburst';
    case TileMap = 'tilemap';
    case Timeline = 'timeline';
    case Treemap = 'treemap';
    case VariablePie = 'variablepie';
    case Variwide = 'variwide';
    case Vector = 'vector';
    case Venn = 'venn';
    case Waterfall = 'waterfall';
    case Windbarb = 'windbarb';
    case WordCloud = 'wordcloud';
    case Xrange = 'xrange';
}
