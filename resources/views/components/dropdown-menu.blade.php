<div
    x-data="{ open: false }"
    @mouseenter="open = true"
    @mouseleave="open = false"
    class="relative flex items-center"
>

    <button
        class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 hover:text-indigo-600">

        {{ $title }}

        <svg
            class="ml-1 h-4 w-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>

    </button>

    <div
        x-show="open"
        x-transition
        class="absolute left-0 top-full mt-1 w-56 bg-white rounded-md shadow-lg border z-50">

        {{ $slot }}

    </div>

</div>