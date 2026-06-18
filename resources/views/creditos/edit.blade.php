<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actualizar Crédito
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST"
                    action="{{ route('creditos.update', $credito) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="block mb-1">

                            Número Crédito

                        </label>

                        <input
                            type="text"
                            name="numero_credito"
                            class="border rounded p-2 w-full"
                            value="{{ old('numero_credito', $credito->numero_credito) }}">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-1">

                            Línea de Crédito

                        </label>

                        <select
                            name="linea_credito_id"
                            class="border rounded p-2 w-full">

                            @foreach($lineasCredito as $linea)

                                <option
                                    value="{{ $linea->id }}"
                                    @selected(
                                        old(
                                            'linea_credito_id',
                                            $credito->linea_credito_id
                                        ) == $linea->id
                                    )>

                                    {{ $linea->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">

                        <label class="block mb-1">

                            Titular

                        </label>

                        @php

                        $titular = $credito->personas
                            ->where('pivot.rol', 'TITULAR')
                            ->first();

                        @endphp

                        <select
                            name="titular_id"
                            class="border rounded p-2 w-full">

                            @foreach($beneficiarios as $beneficiario)

                                <option
                                    value="{{ $beneficiario->id }}"
                                    @selected(
                                        old(
                                            'titular_id',
                                            optional($titular)->id
                                        ) == $beneficiario->id
                                    )>

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
                            class="border rounded p-2 w-full"
                            value="{{ old('monto_original', $credito->monto_original) }}">

                    </div>

                    <div class="mb-4">

                        <label>Cantidad Cuotas</label>

                        <input
                            type="number"
                            name="cantidad_cuotas"
                            class="border rounded p-2 w-full"
                            value="{{ old('cantidad_cuotas', $credito->cantidad_cuotas) }}">

                    </div>

                    <div class="mb-4">

                        <label>Tasa Interés</label>

                        <input
                            type="number"
                            step="0.0001"
                            name="tasa_interes"
                            class="border rounded p-2 w-full"
                            value="{{ old('tasa_interes', $credito->tasa_interes) }}">

                    </div>

                    <div class="mb-4">

                        <label>Fecha Otorgamiento</label>

                        <input
                            type="date"
                            name="fecha_otorgamiento"
                            class="border rounded p-2 w-full"
                            value="{{ old(
                                'fecha_otorgamiento',
                                optional($credito->fecha_otorgamiento)->format('Y-m-d')
                            ) }}">

                    </div>

                    <div class="mb-4">

                        <label>Primer Vencimiento</label>

                        <input
                            type="date"
                            name="fecha_primer_vencimiento"
                            class="border rounded p-2 w-full"
                            value="{{ old(
                                'fecha_primer_vencimiento',
                                optional($credito->fecha_primer_vencimiento)->format('Y-m-d')
                            ) }}">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-1">
                            Estado
                        </label>

                        <select
                            name="estado"
                            class="border rounded p-2 w-full">

                            <option
                                value="ACTIVO"
                                @selected($credito->estado == 'ACTIVO')>

                                ACTIVO

                            </option>

                            <option
                                value="CANCELADO"
                                @selected($credito->estado == 'CANCELADO')>

                                CANCELADO

                            </option>

                        </select>

                    </div>

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