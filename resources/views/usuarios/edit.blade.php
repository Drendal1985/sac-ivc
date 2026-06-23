<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Editar Usuario</h2>
    </x-slot>

    <div class="p-6">

        <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
            @csrf
            @method('PUT')

            <div>
                <label>Nombre</label>
                <input type="text" name="name"
                       value="{{ $usuario->name }}"
                       class="w-full border p-2">
            </div>

            <div class="mt-2">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ $usuario->email }}"
                       class="w-full border p-2">
            </div>

            <div class="mt-2">
                <label>Password (opcional)</label>
                <input type="password" name="password"
                       class="w-full border p-2">
            </div>

            <div class="mt-4">
                <label>Roles</label>

                @foreach ($roles as $role)
                    <div>
                        <label>
                            <input type="checkbox"
                                   name="roles[]"
                                   value="{{ $role->name }}"
                                   {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
                Actualizar
            </button>
        </form>

    </div>
</x-app-layout>