<div class="flex mt-1 rounded-md shadow-sm">
    <input wire:model.stop="filters.{{ $key }}" wire:key="filter-{{ $key }}"
        id="filter-{{ $key }}" type="date"
        @if (isset($filter->options['min']) && strlen($filter->options['min'])) min="{{ $filter->options['min'] }}" @endif
        @if (isset($filter->options['max']) && strlen($filter->options['max'])) max="{{ $filter->options['max'] }}" @endif
        class="block w-full transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm focus:border-cyan-600 focus:ring focus:ring-cyan-200 ring-opacity-50 dark:bg-gray-800 dark:text-white dark:border-gray-600" />
</div>
