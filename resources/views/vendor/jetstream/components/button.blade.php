<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0']) }}>
    {{ $slot }}
</button>
