<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Crear Usuario</h2>
    </x-slot>

    <div class="p-6">

        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf

            <div>
                <label>Nombre</label>
                <input type="text" name="name" class="w-full border p-2">
            </div>

            <div class="mt-2">
                <label>Email</label>
                <input type="email" name="email" class="w-full border p-2">
            </div>

            <div class="mt-2">
                <label>Password</label>
                <input type="password" name="password" class="w-full border p-2">
            </div>

            <div class="mt-4">
                <label>Roles</label>

                @foreach ($roles as $role)
                    <div>
                        <label>
                            <input type="checkbox" name="roles[]" value="{{ $role->name }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </form>

    </div>
</x-app-layout>