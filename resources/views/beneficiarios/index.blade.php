<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Beneficiarios
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="flex justify-between mb-4">

                        <h3 class="text-lg font-semibold">
                            Listado de Beneficiarios
                        </h3>

                        @can('beneficiarios.crear')
                        <a href="{{ route('beneficiarios.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                            Nuevo Beneficiario

                        </a>
                        @endcan

                    </div>

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">

                        <form method="GET" action="{{ route('beneficiarios.index') }}" class="mb-6">

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                                <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Documento, nombre o CUIT" class="border rounded p-2">

                                <select name="tipo_persona" class="border rounded p-2">
                                    <option value="">Todas las personas</option>
                                    <option value="FISICA" @selected(request('tipo_persona') == 'FISICA')>Física</option>
                                    <option value="JURIDICA" @selected(request('tipo_persona') == 'JURIDICA')> Jurídica</option>
                                </select>

                                <select name="estado" class="border rounded p-2">
                                    <option value="">Todos los estados</option>
                                    <option value="ACTIVO" @selected(request('estado') == 'ACTIVO')>Activo</option>
                                    <option value="INACTIVO" @selected(request('estado') == 'INACTIVO')>Inactivo</option>
                                </select>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>

                                <a href="{{ route('beneficiarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Limpiar</a>

                            </div>

                        </form>

                    </div>

                    <div class="mb-4 text-sm text-gray-600">
                        Total encontrados: <strong>{{ $beneficiarios->total() }}</strong>
                    </div>
                    
                    <table class="min-w-full border border-gray-300" style="width: 100%">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="border px-4 py-2 text-left">
                                    ID
                                </th>

                                <th class="border px-4 py-2 text-left">
                                    Documento
                                </th>

                                <th class="border px-4 py-2 text-left">
                                    Nombre
                                </th>

                                <th class="border px-4 py-2 text-left">
                                    Apellido
                                </th>

                                <th class="border px-4 py-2 text-left">
                                    Estado
                                </th>

                                <th class="border px-4 py-2 text-center">
                                    Acciones
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($beneficiarios as $beneficiario)

                            <tr>

                                <td class="border px-4 py-2">
                                    {{ $beneficiario->id }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $beneficiario->numero_documento }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $beneficiario->nombre }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $beneficiario->apellido }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $beneficiario->estado }}
                                </td>

                                <td class="border px-4 py-2 text-center">

                                    <a
                                        href="{{ route('beneficiarios.show', $beneficiario) }}"
                                        class="text-green-600">

                                        Ver

                                    </a>

                                    |
                                    @can('beneficiarios.editar')
                                    <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}"
                                       class="text-green-600 hover:underline">
                                        Editar
                                    </a>
                                    @endcan

                                    @can('beneficiarios.eliminar')
                                    <form
                                        action="{{ route('beneficiarios.destroy', $beneficiario->id) }}"
                                        method="POST"
                                        style="display:inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('¿Eliminar beneficiario?')">

                                            Eliminar

                                        </button>

                                    </form>
                                    @endcan

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="border px-4 py-4 text-center text-gray-500">

                                    No hay beneficiarios registrados

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                    <div class="mt-4">
                        {{ $beneficiarios->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>