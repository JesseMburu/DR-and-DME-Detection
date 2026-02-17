@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-blue-400 text-start text-base font-semibold text-white bg-white/10 focus:outline-none focus:text-white focus:bg-white/15 focus:border-blue-500 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-semibold text-slate-300 hover:text-white hover:bg-white/10 hover:border-blue-400 focus:outline-none focus:text-white focus:bg-white/15 focus:border-blue-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
