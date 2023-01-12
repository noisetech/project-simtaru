<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 md:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-md cursor-default dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            class="relative inline-flex items-center px-4 py-2 mr-3 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out border rounded-md bg-cyan-600 border-cyan-600 focus:ring-4 focus:ring-cyan-100 dark:bg-gray-700 dark:text-white dark:ring-gray-600 dark:border-gray-600 dark:hover:bg-gray-600">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out border rounded-md bg-cyan-600 border-cyan-600 focus:ring-4 focus:ring-cyan-100 dark:bg-gray-700 dark:text-white dark:ring-gray-600 dark:border-gray-600 dark:hover:bg-gray-600">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span
                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>

            <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
                <div>
                    <p class="text-sm leading-5 text-gray-700 dark:text-white">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-bold">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-bold">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-bold">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-not-allowed rounded-l-md dark:bg-gray-700 dark:text-white dark:border-gray-600"
                                        aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                    rel="prev"
                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-gray-200 border border-gray-300 rounded-l-md hover:text-gray-800 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-cyan-100 focus:border-cyan-600 focus:shadow-outline-blue dark:bg-gray-700 dark:text-white dark:ring-gray-600 dark:border-gray-600 dark:hover:bg-gray-600"
                                    aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-default dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span
                                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold leading-5 text-white border cursor-default border-cyan-600 bg-cyan-600 dark:bg-gray-500 dark:text-white dark:border-gray-500">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button type="button"
                                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:bg-gray-300 hover:text-gray-800 focus:z-10 focus:outline-none focus:border-cyan-600 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 dark:bg-gray-700 dark:text-white dark:ring-gray-600 dark:border-gray-600 dark:hover:bg-gray-600"
                                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                    rel="next"
                                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-gray-200 border border-gray-300 rounded-r-md hover:text-gray-800 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-cyan-100 focus:border-cyan-600 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 dark:bg-gray-700 dark:text-white dark:ring-gray-600 dark:border-gray-600 dark:hover:bg-gray-600"
                                    aria-label="{{ __('pagination.next') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-not-allowed rounded-r-md dark:bg-gray-700 dark:text-white dark:border-gray-600"
                                        aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
