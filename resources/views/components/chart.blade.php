<figure {{ $attributes->class('chart')->merge([
    'x-data' => 'highchartsChart',
]) }}>
    <div class="chart-container" wire:ignore x-bind="exportData" x-ref="container"></div>
    {{ $slot }}
</figure>
