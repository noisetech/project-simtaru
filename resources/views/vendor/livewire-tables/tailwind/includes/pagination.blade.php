@if ($showPagination)
    <div class="py-2 md:p-0">
        @if ($paginationEnabled && $rows->lastPage() > 1)
            {{ $rows->links('livewire-tables::tailwind.includes.partials.pagination') }}
        @else
            <p class="text-sm leading-5 text-gray-700 dark:text-white">
                @lang('Showing')
                <span class="font-bold">{{ $rows->count() }}</span>
                @lang('results')
            </p>
        @endif
    </div>
@endif
