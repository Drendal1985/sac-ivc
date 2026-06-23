<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
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

                        @can('usuarios.crear')
                        <a href="{{ route('usuarios.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

                            Nuevo Usuario

                        </a>
                        @endcan

                    </div>

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full border border-gray-300" style="width: 100%">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2 text-left">Nombre</th>
                                <th class="border px-4 py-2 text-left">Email</th>
                                <th class="border px-4 py-2 text-left">Roles</th>
                                <th class="border px-4 py-2 text-left">Fecha Creación</th>
                                <th class="border px-4 py-2 text-left">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">
                                        @foreach ($user->roles as $role)
                                            <span class="px-2 py-1 bg-gray-200 rounded text-sm">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2">{{ $user->created_at }}</td>
                                    <td class="border px-4 py-2">
                                        <x-table.actions>
                                            <x-buttons.icon-edit
                                                :href="route('usuarios.edit', $user)"
                                                title="Editar Usuario" />
                                            <x-buttons.icon-delete
                                                :action="route('usuarios.destroy', $user)"
                                                title="Eliminar Usuario"
                                                message="¿Eliminar el Usuario {{ $user->name }}?" />
                                        </x-table.actions>
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
                        {{ $users->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>