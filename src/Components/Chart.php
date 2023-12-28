<?php

namespace BernskioldMedia\LaravelHighcharts\Components;

use Illuminate\View\Component;

class Chart extends Component
{

    public function render()
    {
        return view('livewire-highcharts::chart');
    }
}
