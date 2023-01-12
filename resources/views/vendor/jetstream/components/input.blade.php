@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-4 focus:ring-cyan-100 focus:border-cyan-600']) !!}>
