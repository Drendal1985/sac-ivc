<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Panel de Control
            </h2>

            <span class="text-sm text-gray-500">
                Sistema de Créditos • Operación General
            </span>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- 🔷 KPIs PRINCIPALES (nivel ejecutivo) --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <p class="text-xs text-gray-500 uppercase">Cartera Total</p>
                <p class="text-2xl font-bold">$ 980.450.000</p>
                <p class="text-xs text-green-600 mt-1">▲ 4.2% vs mes anterior</p>
            </div>

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <p class="text-xs text-gray-500 uppercase">Créditos Activos</p>
                <p class="text-2xl font-bold">532</p>
                <p class="text-xs text-gray-500 mt-1">Operativos en curso</p>
            </div>

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <p class="text-xs text-gray-500 uppercase">Tasa de Mora</p>
                <p class="text-2xl font-bold text-red-600">18.4%</p>
                <p class="text-xs text-red-500 mt-1">▲ +1.1% riesgo</p>
            </div>

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <p class="text-xs text-gray-500 uppercase">Cobranza del Mes</p>
                <p class="text-2xl font-bold text-green-600">$ 120.4M</p>
                <p class="text-xs text-gray-500 mt-1">Objetivo: 85%</p>
            </div>

        </div>

        {{-- 🧩 ESTADO OPERATIVO (tipo “control room”) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <h3 class="font-semibold text-gray-700 mb-3">Estado de Créditos</h3>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span>Pendientes</span>
                        <span class="font-semibold">42</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Activos</span>
                        <span class="font-semibold">532</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Refinanciados</span>
                        <span class="font-semibold">28</span>
                    </div>
                    <div class="flex justify-between text-red-600">
                        <span>Judicializados</span>
                        <span class="font-semibold">8</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <h3 class="font-semibold text-gray-700 mb-3">Riesgo (Mora)</h3>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span>Crítica</span>
                        <span class="text-red-600 font-semibold">42</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Alta</span>
                        <span class="text-orange-500 font-semibold">110</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Media</span>
                        <span class="text-yellow-500 font-semibold">280</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Baja</span>
                        <span class="text-green-600 font-semibold">560</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <h3 class="font-semibold text-gray-700 mb-3">Operación</h3>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span>Pagos hoy</span>
                        <span class="font-semibold">312</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Imputaciones</span>
                        <span class="font-semibold">298</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Importaciones</span>
                        <span class="font-semibold">4</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Procesos activos</span>
                        <span class="font-semibold">2</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- 📊 BLOQUE CENTRAL (visión negocio) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <h3 class="font-semibold mb-4">Flujo de Recupero</h3>

                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span>Contactos realizados</span>
                        <span>6.750</span>
                    </div>
                    <div class="flex justify-between">
                        <span>WhatsApp enviados</span>
                        <span>3.450</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Promesas de pago</span>
                        <span>820</span>
                    </div>
                    <div class="flex justify-between text-green-600">
                        <span>Recupero efectivo</span>
                        <span>$ 620M</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg p-5 shadow-sm">
                <h3 class="font-semibold mb-4">Actividad del Sistema</h3>

                <ul class="text-sm space-y-2 text-gray-600">
                    <li>✔ Importación FISERV procesada</li>
                    <li>✔ Recalculo de mora ejecutado</li>
                    <li>✔ Generación de cuotas mensual</li>
                    <li>⚠ 6 errores en conciliación bancaria</li>
                    <li>✔ Campaña de cobranza activa</li>
                </ul>
            </div>

        </div>

    </div>

    {{-- 📌 FOOTER SISTEMA --}}
    <div class="mt-8 bg-white border rounded-lg shadow-sm p-4">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            {{-- Estado del sistema --}}
            <div>
                <p class="text-sm font-semibold text-gray-700">
                    Estado del Sistema
                </p>

                <p class="text-xs text-gray-500">
                    Última actualización simulada: 23/06/2026 10:45 AM
                </p>
            </div>

            {{-- indicadores --}}
            <div class="flex flex-wrap gap-2 text-xs">

                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                    Operativo
                </span>

                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                    Sin incidentes críticos
                </span>

                <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700">
                    Ambiente: Desarrollo
                </span>

            </div>

            {{-- info sistema --}}
            <div class="text-xs text-gray-500 md:text-right">
                <p>Core Crediticio v1.0</p>
                <p>Laravel + Spatie Permissions</p>
            </div>

        </div>

        {{-- línea inferior --}}
        <div class="mt-3 pt-3 border-t text-xs text-gray-400 flex flex-col md:flex-row md:justify-between gap-2">

            <span>
                © {{ date('Y') }} Sistema de Gestión de Créditos
            </span>

            <span>
                Auditoría habilitada • Logging activo • Seguridad por roles
            </span>

        </div>

    </div>
</x-app-layout>