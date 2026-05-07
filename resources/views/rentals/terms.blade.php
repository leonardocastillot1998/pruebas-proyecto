<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Version {{ $termsVersion }}</p>
                <h2 class="text-xl font-bold text-slate-900">Terminos y condiciones del alquiler</h2>
            </div>
            <a
                href="{{ route('rentals.create') }}"
                class="inline-flex items-center rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:text-slate-900"
            >
                Volver a la renta
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto flex max-w-5xl flex-col gap-6 px-4 sm:px-6 lg:px-8">
            <section class="overflow-hidden rounded-3xl bg-slate-900 text-white shadow-xl">
                <div class="bg-[radial-gradient(circle_at_top_left,_rgba(56,189,248,0.35),_transparent_40%),linear-gradient(135deg,#0f172a,#1e293b_55%,#334155)] px-6 py-8 sm:px-8">
                    <p class="text-sm uppercase tracking-[0.3em] text-sky-200">Producto a rentar</p>
                    <h3 class="mt-3 text-3xl font-semibold">{{ $rental['item_name'] }}</h3>
                    <p class="mt-3 max-w-3xl text-sm leading-6 text-slate-200">
                        Antes de confirmar la renta, revisa con cuidado estas condiciones. Al continuar aceptas tus obligaciones sobre el uso, cuidado, devolucion y posibles cobros asociados al producto.
                    </p>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <h3 class="text-2xl font-semibold text-slate-900">Condiciones de alquiler</h3>
                    <div class="mt-6 space-y-4 text-sm leading-7 text-slate-600">
                        @foreach (explode("\n", $termsContent) as $term)
                            <div class="rounded-2xl bg-slate-50 px-4 py-4">
                                <p>{{ $term }}</p>
                            </div>
                        @endforeach
                    </div>
                </article>

                <aside class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="text-xl font-semibold text-slate-900">Resumen rapido</h3>
                    <div class="mt-6 space-y-4 text-sm text-slate-600">
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Duracion</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">{{ $rental['rental_days'] }} dias</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Entrega</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">{{ $rental['delivery_city'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Valor del alquiler</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">${{ number_format($rental['total_amount'], 0, ',', '.') }}</p>
                        </div>
                        <div class="rounded-2xl bg-emerald-50 p-4 text-emerald-900">
                            <p class="font-semibold">Importante</p>
                            <p class="mt-2 leading-6">
                                Debes volver a la pantalla de confirmacion y marcar la aceptacion de terminos para completar la renta.
                            </p>
                        </div>
                    </div>
                </aside>
            </section>
        </div>
    </div>
</x-app-layout>
