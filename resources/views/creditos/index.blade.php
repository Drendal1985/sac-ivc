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

                                <td class="border p-2">

                                    <a
                                        href="{{ route('creditos.show', $credito) }}"
                                        class="text-blue-600">

                                        Ver

                                    </a>

                                    |

                                    <a
                                        href="{{ route('creditos.edit', $credito) }}"
                                        class="text-green-600">

                                        Editar

                                    </a>

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