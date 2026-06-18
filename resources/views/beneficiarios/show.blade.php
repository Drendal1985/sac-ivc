<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Beneficiario
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <table class="table-auto w-full">

                    <tr>
                        <th class="text-left">ID</th>
                        <td>{{ $beneficiario->id }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Tipo Persona</th>
                        <td>{{ $beneficiario->tipo_persona }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Documento</th>
                        <td>{{ $beneficiario->numero_documento }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">CUIT</th>
                        <td>{{ $beneficiario->cuit }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Nombre</th>
                        <td>{{ $beneficiario->nombre }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Apellido</th>
                        <td>{{ $beneficiario->apellido }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Estado</th>
                        <td>{{ $beneficiario->estado }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Creado</th>
                        <td>{{ $beneficiario->created_at }}</td>
                    </tr>

                </table>

                <div class="mt-6">

                    <a
                        href="{{ route('beneficiarios.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Volver

                    </a>

                    @can('beneficiarios.editar')

                        <a
                            href="{{ route('beneficiarios.edit', $beneficiario) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded">

                            Editar

                        </a>

                    @endcan

                </div>

            </div>

        </div>

    </div>

</x-app-layout>