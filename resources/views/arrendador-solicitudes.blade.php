<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Panel Arrendador</p>
                <h2 class="text-xl font-bold text-slate-900">Solicitudes recibidas</h2>
            </div>
            <a
                href="/arrendador"
                class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h3 class="text-lg font-semibold text-slate-900">Gestiona las solicitudes de alquiler</h3>
                    <p class="mt-1 text-sm text-slate-600">
                        Aprueba o rechaza las solicitudes para decidir con quien concretar el negocio.
                    </p>
                </div>

                @if ($requests->isEmpty())
                    <div class="px-6 py-12 text-center">
                        <p class="text-lg font-semibold text-slate-900">Aun no has recibido solicitudes.</p>
                        <p class="mt-2 text-sm text-slate-500">
                            Cuando un arrendatario confirme una reserva, la veras reflejada aqui.
                        </p>
                    </div>
                @else
                    <div class="divide-y divide-slate-200">
                        @foreach ($requests as $requestItem)
                            <article class="grid gap-6 px-6 py-6 lg:grid-cols-[1.4fr_0.9fr] lg:items-center">
                                <div class="space-y-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h4 class="text-lg font-semibold text-slate-900">{{ $requestItem->item_name }}</h4>
                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold
                                            @if ($requestItem->status === 'pendiente')
                                                bg-amber-100 text-amber-800
                                            @elseif ($requestItem->status === 'aprobada')
                                                bg-emerald-100 text-emerald-800
                                            @else
                                                bg-rose-100 text-rose-800
                                            @endif
                                        ">
                                            {{ ucfirst($requestItem->status) }}
                                        </span>
                                    </div>

                                    <div class="grid gap-3 text-sm text-slate-600 sm:grid-cols-2 xl:grid-cols-4">
                                        <div class="rounded-2xl bg-slate-50 p-4">
                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Solicitante</p>
                                            <p class="mt-2 font-semibold text-slate-900">{{ $requestItem->user->name }}</p>
                                            <p class="text-slate-500">{{ $requestItem->user->email }}</p>
                                            <p class="text-slate-500">Documento: {{ $requestItem->user->document }}</p>
                                            <p class="text-slate-500">Telefono: {{ $requestItem->user->phone }}</p>
                                        </div>
                                        <div class="rounded-2xl bg-slate-50 p-4">
                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Fechas</p>
                                            <p class="mt-2 font-semibold text-slate-900">{{ $requestItem->starts_at->format('d/m/Y') }} - {{ $requestItem->ends_at->format('d/m/Y') }}</p>
                                            <p class="text-slate-500">{{ $requestItem->rental_days }} dias</p>
                                        </div>
                                        <div class="rounded-2xl bg-slate-50 p-4">
                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Valor</p>
                                            <p class="mt-2 font-semibold text-slate-900">${{ number_format($requestItem->total_amount, 0, ',', '.') }}</p>
                                            <p class="text-slate-500">Reserva #{{ $requestItem->id }}</p>
                                        </div>
                                        <div class="rounded-2xl bg-slate-50 p-4">
                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Aceptacion</p>
                                            <p class="mt-2 font-semibold text-slate-900">{{ $requestItem->accepted_terms_at->format('d/m/Y H:i') }}</p>
                                            <p class="text-slate-500">Terminos {{ $requestItem->terms_version }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3 lg:items-end">
                                    @if ($requestItem->status === 'pendiente')
                                        <form method="POST" action="{{ route('landlord.requests.update', $requestItem) }}" class="w-full lg:w-auto">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="decision" value="aprobada">
                                            <button
                                                type="submit"
                                                class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-500"
                                            >
                                                Aprobar solicitud
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('landlord.requests.update', $requestItem) }}" class="w-full lg:w-auto">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="decision" value="rechazada">
                                            <button
                                                type="submit"
                                                class="inline-flex w-full items-center justify-center rounded-xl border border-rose-300 px-5 py-3 text-sm font-semibold text-rose-700 hover:bg-rose-50"
                                            >
                                                Rechazar solicitud
                                            </button>
                                        </form>
                                    @else
                                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                                            Esta solicitud ya fue {{ $requestItem->status }}.
                                        </div>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
