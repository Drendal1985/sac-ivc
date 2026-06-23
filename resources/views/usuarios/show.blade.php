<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Usuario
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <table class="table-auto w-full">

                    <tr>
                        <th class="text-left">ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Nombre</th>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Correo</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th class="text-left">Fecha Creación</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>

                </table>

                <div class="mt-6">

                    <a
                        href="{{ route('usuarios.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Volver

                    </a>

                    @can('beneficiarios.editar')

                        <a
                            href="{{ route('usuarios.edit', $user) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded">

                            Editar

                        </a>

                    @endcan

                </div>

            </div>

        </div>

    </div>

</x-app-layout>