<?php

namespace BernskioldMedia\LaravelHighcharts\Exceptions;

use Exception;

class ChartExportException extends Exception
{
    public static function missingChartKey(): self
    {
        return new static('The chart key is missing. Please provide a chart key to the exportChart() method or set a chartKey property on the component.');
    }
}
