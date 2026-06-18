<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Crédito
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <strong>Número:</strong>
                        {{ $credito->numero_credito }}
                    </div>

                    <div>
                        <strong>Estado:</strong>
                        {{ $credito->estado }}
                    </div>

                    <div>
                        <strong>Línea:</strong>
                        {{ $credito->lineaCredito->nombre }}
                    </div>

                    <div>
                        <strong>Fecha Otorgamiento:</strong>
                        {{ $credito->fecha_otorgamiento?->format('d/m/Y') }}
                    </div>

                    <div>
                        <strong>Monto Original:</strong>
                        $ {{ number_format($credito->monto_original,2,',','.') }}
                    </div>

                    <div>
                        <strong>Saldo Capital:</strong>
                        $ {{ number_format($credito->saldo_capital,2,',','.') }}
                    </div>

                    <div>
                        <strong>Cantidad Cuotas:</strong>
                        {{ $credito->cantidad_cuotas }}
                    </div>

                    <div>
                        <strong>Tasa:</strong>
                        {{ $credito->tasa_interes }}
                    </div>

                </div>

                <hr class="my-6">

                <h3 class="text-lg font-bold mb-3">
                    Participantes
                </h3>

                <table class="min-w-full border">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="border p-2">
                                Rol
                            </th>

                            <th class="border p-2">
                                Documento
                            </th>

                            <th class="border p-2">
                                Nombre
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($credito->personas as $persona)

                            <tr>

                                <td class="border p-2">
                                    {{ $persona->pivot->rol }}
                                </td>

                                <td class="border p-2">
                                    {{ $persona->numero_documento }}
                                </td>

                                <td class="border p-2">
                                    {{ $persona->apellido }}
                                    {{ $persona->nombre }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

                <div class="mt-6">

                    <a
                        href="{{ route('creditos.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Volver

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>