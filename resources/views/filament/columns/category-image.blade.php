@if ($state)
    <img src="{{ asset('storage/' . $state) }}" alt="Category Image" class="h-6 w-6 rounded-full object-cover" />
@else
    <span class="text-gray-400">No Image</span>
@endif
