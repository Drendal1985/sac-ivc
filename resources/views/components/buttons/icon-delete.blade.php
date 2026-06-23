@props([
    'action',
    'title' => 'Eliminar',
    'message' => '¿Está seguro de eliminar este registro?'
])

<x-ui.tooltip :text="$title">

    <form
        action="{{ $action }}"
        method="POST"
        class="inline-flex items-center m-0 p-0 align-middle"
        onsubmit="return confirm('{{ $message }}')">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="text-red-600 hover:text-red-800 hover:scale-110 transition duration-150">

            <x-heroicon-o-trash class="w-5 h-5" />

        </button>

    </form>

</x-ui.tooltip>