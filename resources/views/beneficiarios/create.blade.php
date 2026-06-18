<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Beneficiario
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST"
                      action="{{ route('beneficiarios.store') }}">

                    @csrf

                    <div class="mb-4">
                        <label>Tipo Persona</label>

                        <select name="tipo_persona">
                            <option value="">Seleccionar</option>
                            <option value="FISICA">Física</option>
                            <option value="JURIDICA">Jurídica</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>DNI</label>

                        <input
                            type="text"
                            name="numero_documento"
                            class="border rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label>CUIT</label>

                        <input
                            type="text"
                            name="cuit"
                            class="border rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label>Nombre</label>

                        <input
                            type="text"
                            name="nombre"
                            class="border rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label>Apellido</label>

                        <input
                            type="text"
                            name="apellido"
                            class="border rounded p-2 w-full">
                    </div>

                    <input
                        type="hidden"
                        name="estado"
                        value="ACTIVO">

                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">

                        Guardar

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>