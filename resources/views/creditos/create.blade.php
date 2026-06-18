<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Crédito
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST"
                      action="{{ route('creditos.store') }}">

                    @csrf

                    <div class="mb-4">

                        <label class="block mb-1">

                            Número Crédito

                        </label>

                        <input
                            type="text"
                            name="numero_credito"
                            class="border rounded p-2 w-full">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-1">

                            Línea de Crédito

                        </label>

                        <select
                            name="linea_credito_id"
                            class="border rounded p-2 w-full">

                            <option value="">
                                Seleccionar
                            </option>

                            @foreach($lineasCredito as $linea)

                                <option value="{{ $linea->id }}">

                                    {{ $linea->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">

                        <label class="block mb-1">

                            Titular

                        </label>

                        <select
                            name="titular_id"
                            class="border rounded p-2 w-full">

                            <option value="">
                                Seleccionar
                            </option>

                            @foreach($beneficiarios as $beneficiario)

                                <option value="{{ $beneficiario->id }}">

                                    {{ $beneficiario->apellido }}
                                    {{ $beneficiario->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">

                        <label>Monto Original</label>

                        <input
                            type="number"
                            step="0.01"
                            name="monto_original"
                            class="border rounded p-2 w-full">

                    </div>

                    <div class="mb-4">

                        <label>Cantidad Cuotas</label>

                        <input
                            type="number"
                            name="cantidad_cuotas"
                            class="border rounded p-2 w-full">

                    </div>

                    <div class="mb-4">

                        <label>Tasa Interés</label>

                        <input
                            type="number"
                            step="0.0001"
                            name="tasa_interes"
                            class="border rounded p-2 w-full">

                    </div>

                    <div class="mb-4">

                        <label>Fecha Otorgamiento</label>

                        <input
                            type="date"
                            name="fecha_otorgamiento"
                            class="border rounded p-2 w-full">

                    </div>

                    <div class="mb-4">

                        <label>Primer Vencimiento</label>

                        <input
                            type="date"
                            name="fecha_primer_vencimiento"
                            class="border rounded p-2 w-full">

                    </div>

                    <input
                        type="hidden"
                        name="estado"
                        value="ACTIVO">

                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

                        Guardar

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>