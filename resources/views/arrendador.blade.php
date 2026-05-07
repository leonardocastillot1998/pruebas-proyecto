<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Panel Arrendador</h2>
    </x-slot>

    <div class="p-6">
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-2">Tu propiedad</h3>
                <p>Aqui podras gestionar tus bienes.</p>
            </div>

            <div class="bg-white p-6 rounded shadow border border-slate-200">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Solicitudes</p>
                <h3 class="mt-2 text-lg font-bold text-slate-900">Solicitudes recibidas</h3>
                <p class="mt-2 text-slate-600">
                    Revisa las solicitudes de alquiler pendientes y decide si deseas aprobarlas o rechazarlas.
                </p>
                <a
                    href="{{ route('landlord.requests.index') }}"
                    class="mt-4 inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700"
                >
                    Ver solicitudes
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
