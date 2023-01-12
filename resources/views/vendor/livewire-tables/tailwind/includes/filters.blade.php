@if ($filtersEnabled && $showFilterDropdown && ($filtersView || count($customFilters)))
    <div x-data="{ open: false }" x-on:keydown.escape.stop="open = false" x-on:mousedown.away="open = false"
        class="relative block text-left md:inline-block">
        <div>
            <button type="button"
                class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:border-cyan-600 focus:ring focus:ring-cyan-200 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                x-on:click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" aria-expanded="true">
                <div class="">
                    @lang('Filters')

                    @if (count($this->getFiltersWithoutSearch()))
                        <span
                            class="ml-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-cyan-100 text-cyan-700 capitalize dark:bg-indigo-200 dark:text-indigo-900">
                            {{ count($this->getFiltersWithoutSearch()) }}
                        </span>
                    @endif
                </div>

                {{-- <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 ml-5 text-gray-500 ">
                    <path
                        d="M3.853 54.87C10.47 40.9 24.54 32 40 32H472C487.5 32 501.5 40.9 508.1 54.87C514.8 68.84 512.7 85.37 502.1 97.33L320 320.9V448C320 460.1 313.2 471.2 302.3 476.6C291.5 482 278.5 480.9 268.8 473.6L204.8 425.6C196.7 419.6 192 410.1 192 400V320.9L9.042 97.33C-.745 85.37-2.765 68.84 3.854 54.87L3.853 54.87z"
                        fill="currentColor" />
                </svg>
            </button>
        </div>

        <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 z-50 w-full mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg md:w-56 ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-700 dark:text-white dark:divide-gray-600"
            role="menu" aria-orientation="vertical">
            @if ($filtersView)
                @include($filtersView)
            @elseif (count($customFilters))
                @foreach ($customFilters as $key => $filter)
                    <div class="py-1" role="none">
                        <div class="block px-4 py-2 text-sm text-gray-700 dark:text-white" role="menuitem">
                            <label for="filter-{{ $key }}"
                                class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                                {{ $filter->name() }}
                            </label>

                            @if ($filter->isSelect())
                                @include(
                                    'livewire-tables::tailwind.includes.filter-type-select'
                                )
                            @elseif($filter->isMultiSelect())
                                @include(
                                    'livewire-tables::tailwind.includes.filter-type-multiselect'
                                )
                            @elseif($filter->isDate())
                                @include(
                                    'livewire-tables::tailwind.includes.filter-type-date'
                                )
                            @elseif($filter->isDatetime())
                                @include(
                                    'livewire-tables::tailwind.includes.filter-type-datetime'
                                )
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

            @if (count($this->getFiltersWithoutSearch()))
                <div class="py-1" role="none">
                    <div class="block px-4 py-2 text-sm" role="menuitem">
                        <button wire:click.prevent="resetFilters" x-on:click="open = false" type="button"
                            class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium leading-4 text-white border rounded-md shadow-sm bg-rose-600 border-rose-600 hover:bg-rose-100 hover:border-rose-100 hover:text-rose-600 focus:ring focus:ring-rose-600 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:border-gray-500">
                            @lang('Clear')
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
