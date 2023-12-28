@props(['chartKey'])
<figure {{ $attributes->class('chart')->merge([
    'x-data' => 'highchartsChart',
]) }}>
    <div class="chart-container" id="{{ $chartKey }}" wire:ignore x-bind="exportData" x-ref="container"></div>
    {{ $slot }}
</figure>
