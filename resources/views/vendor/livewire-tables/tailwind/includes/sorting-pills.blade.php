<div>
    @if ($showSorting && count($sorts))
        <div class="mb-4 md:mb-4 md:p-0">
            <small class="text-gray-700 dark:text-white">@lang('Applied Sorting'):</small>

            @foreach ($sorts as $col => $dir)
                <span wire:key="sorting-pill-{{ $col }}"
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-cyan-100 text-cyan-700 capitalize dark:bg-indigo-200 dark:text-indigo-900">
                    {{ $sortNames[$col] ??collect($this->columns())->pluck('text', 'column')->get($col, ucwords(strtr($col, ['_' => ' ', '-' => ' ']))) }}:
                    {{ $dir === 'asc' ? $sortDirectionNames[$col]['asc'] ?? 'A-Z' : $sortDirectionNames[$col]['desc'] ?? 'Z-A' }}

                    <button wire:click="removeSort('{{ $col }}')" type="button"
                        class="inline-flex items-center justify-center flex-shrink-0 w-4 h-4 ml-2 rounded-full text-rose-600 hover:bg-rose-600 hover:text-white focus:outline-none focus:bg-rose-600 bg-rose-200 focus:text-white">
                        <span class="sr-only">@lang('Remove sort option')</span>
                        <svg class="w-2 h-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                        </svg>
                    </button>
                </span>
            @endforeach

            <button wire:click.prevent="resetSorts" class="focus:outline-none active:outline-none">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-rose-100 font-medium hover:bg-rose-600 hover:text-white text-rose-600 dark:bg-gray-200 dark:text-gray-900">
                    @lang('Clear')
                </span>
            </button>
        </div>
    @endif
</div>
