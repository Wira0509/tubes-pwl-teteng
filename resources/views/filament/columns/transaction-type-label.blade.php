@props(['expense'])

@php
    $label = $expense ? 'Expense' : 'Income';
@endphp
<div class="flex items-center justify-center gap-1">
    @if ($expense)
        <x-heroicon-s-arrow-trending-down class="w-4 h-4 text-red-500" />
    @else
        <x-heroicon-s-arrow-trending-up class="w-4 h-4 text-green-500" />
    @endif
    <span>{{ $label }}</span>
</div>
