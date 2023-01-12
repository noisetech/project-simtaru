@props(['customSecondaryHeader' => false, 'useHeaderAsFooter' => false, 'customFooter' => false])

<div class="min-w-full overflow-hidden overflow-x-auto align-middle rounded-lg shadow">
    <table {{ $attributes->except(['wire:sortable', 'class']) }}
        class="{{ trim($attributes->get('class')) ?: 'min-w-full divide-y divide-gray-200 dark:divide-none' }}">
        <thead>
            <tr>
                {{ $head }}
            </tr>
        </thead>

        <tbody {{ $attributes->only('wire:sortable') }}
            class="bg-white divide-y divide-cyan-100 dark:bg-gray-800 dark:divide-none">
            @if ($customSecondaryHeader)
                {{ $customSecondaryHead }}
            @endif

            {{ $body }}
        </tbody>

        @if ($useHeaderAsFooter || $customFooter)
            <tfoot>
                @if ($useHeaderAsFooter)
                    <tr>
                        {{ $head }}
                    </tr>
                @elseif($customFooter)
                    {{ $foot }}
                @endif
            </tfoot>
        @endif
    </table>
</div>
