@props([
    'text'
])

<div class="relative group flex items-center">

    {{ $slot }}

    <div
        class="
            absolute
            bottom-full
            left-1/2
            -translate-x-1/2
            mb-2
            hidden
            group-hover:block
            whitespace-nowrap
            rounded
            bg-gray-800
            px-2
            py-1
            text-xs
            text-white
            shadow-lg
            z-50
        "
    >
        {{ $text }}
    </div>

</div>