<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créditos
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))

                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">

                        {{ session('success') }}

                    </div>

                @endif

                <div class="mb-4">

                    <a href="{{ route('creditos.create') }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

                        Nuevo Crédito

                    </a>

                </div>

                <div class="bg-white shadow rounded-lg p-4 mb-6">

                    <form method="GET">

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                            <div>

                                <label class="block text-sm font-medium mb-1">
                                    Buscar
                                </label>

                                <input
                                    type="text"
                                    name="buscar"
                                    value="{{ request('buscar') }}"
                                    placeholder="N° crédito o beneficiario"
                                    class="w-full rounded border-gray-300">

                            </div>

                            <div>

                                <label class="block text-sm font-medium mb-1">
                                    Estado
                                </label>

                                <select
                                    name="estado"
                                    class="w-full rounded border-gray-300">

                                    <option value="">
                                        Todos
                                    </option>

                                    <option
                                        value="ACTIVO"
                                        @selected(request('estado') == 'ACTIVO')>
                                        ACTIVO
                                    </option>

                                    <option
                                        value="PENDIENTE"
                                        @selected(request('estado') == 'PENDIENTE')>
                                        PENDIENTE
                                    </option>

                                    <option
                                        value="CANCELADO"
                                        @selected(request('estado') == 'CANCELADO')>
                                        CANCELADO
                                    </option>

                                    <option
                                        value="REFINANCIADO"
                                        @selected(request('estado') == 'REFINANCIADO')>
                                        REFINANCIADO
                                    </option>

                                    <option
                                        value="JUDICIALIZADO"
                                        @selected(request('estado') == 'JUDICIALIZADO')>
                                        JUDICIALIZADO
                                    </option>

                                </select>

                            </div>

                            <div>

                                <label class="block text-sm font-medium mb-1">
                                    Línea de Crédito
                                </label>

                                <select
                                    name="linea_credito_id"
                                    class="w-full rounded border-gray-300">

                                    <option value="">
                                        Todas
                                    </option>

                                    @foreach($lineasCredito as $linea)

                                        <option
                                            value="{{ $linea->id }}"
                                            @selected(
                                                request('linea_credito_id')
                                                == $linea->id
                                            )>

                                            {{ $linea->nombre }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div
                                class="flex items-end gap-2">

                                <button
                                    type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                                    Filtrar

                                </button>

                                <a
                                    href="{{ route('creditos.index') }}"
                                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">

                                    Limpiar

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

                <table class="min-w-full border">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="border p-2">N° Crédito</th>

                            <th class="border p-2">Titular</th>

                            <th class="border p-2">Línea</th>

                            <th class="border p-2">Monto</th>

                            <th class="border p-2">Estado</th>

                            <th class="border p-2">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($creditos as $credito)

                            <tr>

                                <td class="border p-2">

                                    {{ $credito->numero_credito }}

                                </td>

                                <td class="border p-2">

                                    {{
                                        optional(
                                            $credito->personas
                                                ->where('pivot.rol', 'TITULAR')
                                                ->first()
                                        )->apellido
                                    }}

                                    {{

                                        optional(
                                            $credito->personas
                                                ->where('pivot.rol', 'TITULAR')
                                                ->first()
                                        )->nombre
                                    }}

                                </td>

                                <td class="border p-2">

                                    {{ $credito->lineaCredito->nombre }}

                                </td>

                                <td class="border p-2 text-right">

                                    $ {{ number_format($credito->monto_original, 2, ',', '.') }}

                                </td>

                                <td class="border p-2">

                                    {{ $credito->estado }}

                                </td>

                                <td class="px-4 py-2">

                                    <x-table.actions>

                                        <x-buttons.icon-show
                                            :href="route('creditos.show', $credito)"
                                            title="Ver detalle" />

                                        <x-buttons.icon-edit
                                            :href="route('creditos.edit', $credito)"
                                            title="Editar crédito" />

                                        <x-buttons.icon-delete
                                            :action="route('creditos.destroy', $credito)"
                                            title="Eliminar crédito"
                                            message="¿Eliminar el crédito {{ $credito->numero_credito }}?" />

                                    </x-table.actions>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="border p-4 text-center">

                                    No hay créditos registrados

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-4">

                    {{ $creditos->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>