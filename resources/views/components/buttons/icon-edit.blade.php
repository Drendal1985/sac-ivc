@props([
    'href',
    'title' => 'Editar'
])

<x-ui.tooltip :text="$title">

    <a
        href="{{ $href }}"
        class="text-amber-600 hover:text-amber-800 hover:scale-110 transition duration-150">

        <x-heroicon-o-pencil-square class="w-5 h-5" />

    </a>

</x-ui.tooltip>