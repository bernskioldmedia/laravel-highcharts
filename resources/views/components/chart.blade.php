<figure {{ $attributes->class('chart')->merge([
    'x-data' => 'highchartsChart',
]) }}>
    <div wire:ignore
         x-bind="exportData"
         class="mx-auto"
         x-ref="container">
    </div>
</figure>
