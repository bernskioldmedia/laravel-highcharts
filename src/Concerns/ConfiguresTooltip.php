<?php

namespace BernskioldMedia\LaravelHighcharts\Concerns;

trait ConfiguresTooltip
{

    public function tooltipValues(?string $prefix = null, ?string $suffix = null, ?int $decimals = 2): self
    {
        if ($prefix) {
            $this->set('tooltip.valuePrefix', $prefix);
        }

        if ($suffix) {
            $this->set('tooltip.valueSuffix', $suffix);
        }

        if ($decimals) {
            $this->set('tooltip.valueDecimals', $decimals);
        }

        return $this;
    }

    public function tooltipHeader(string $format): self
    {
        $this->set('tooltip.headerFormat', $format);

        return $this;
    }

    public function tooltipPoint(string $format): self
    {
        $this->set('tooltip.pointFormat', $format);

        return $this;
    }

    public function tooltipFooter(string $format): self
    {
        $this->set('tooltip.footerFormat', $format);

        return $this;
    }
}
