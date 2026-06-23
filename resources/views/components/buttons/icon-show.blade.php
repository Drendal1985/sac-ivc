@props([
    'href',
    'title' => 'Ver'
])

<x-ui.tooltip :text="$title">

    <a
        href="{{ $href }}"
        class="text-blue-600 hover:text-blue-800 hover:scale-110 transition duration-150">
        <x-heroicon-o-eye class="w-5 h-5" />

    </a>

</x-ui.tooltip>