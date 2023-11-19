<figure class="chart w-full" x-data="highchartsChart">
    <div wire:ignore
         style="height: {{$height}}; {{$alwaysSquare ? 'max-width: '.$height.';': ''}}"
         x-bind="exportChart"
         class="mx-auto"
         x-ref="container">
    </div>
</figure>
