@if ($paginationEnabled && $showPerPage)
    <div class="w-full ml-0 md:w-auto md:ml-2">
        <select wire:model="perPage" id="perPage"
            class="block w-full transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm sm:text-sm sm:leading-5 focus:border-primary focus:ring focus:ring-cyan-300 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
            @foreach ($perPageAccepted as $item)
                <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
            @endforeach
        </select>
    </div>
@endif
