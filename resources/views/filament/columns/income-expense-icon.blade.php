<div class="flex items-center justify-center gap-1">
    <span>{{ $label }}</span>
    @if ($isExpense)
        <x-heroicon-s-arrow-trending-down class="w-4 h-4 text-danger" />
    @else
        <x-heroicon-s-arrow-trending-up class="w-4 h-4 text-success" />
    @endif
</div>
