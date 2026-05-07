<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-slate-900">Confirmar alquiler</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto flex max-w-5xl flex-col gap-6 px-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            <section class="grid gap-6 lg:grid-cols-[1.3fr_0.9fr]">
                <article class="overflow-hidden rounded-3xl bg-slate-900 text-white shadow-xl">
                    <div class="bg-[radial-gradient(circle_at_top_left,_rgba(56,189,248,0.35),_transparent_40%),linear-gradient(135deg,#0f172a,#1e293b_55%,#334155)] px-6 py-8 sm:px-8">
                        <p class="text-sm uppercase tracking-[0.3em] text-sky-200">Resumen de reserva</p>
                        <h3 class="mt-3 text-3xl font-semibold">{{ $rental['item_name'] }}</h3>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-200">
                            Revisa las condiciones finales antes de confirmar. El alquiler solo se registra si aceptas los terminos y condiciones.
                        </p>

                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Fecha de inicio</p>
                                <p class="mt-2 text-lg font-semibold">{{ \Illuminate\Support\Carbon::parse($rental['starts_at'])->translatedFormat('d \\d\\e F, Y') }}</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Fecha de entrega</p>
                                <p class="mt-2 text-lg font-semibold">{{ \Illuminate\Support\Carbon::parse($rental['ends_at'])->translatedFormat('d \\d\\e F, Y') }}</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Duracion</p>
                                <p class="mt-2 text-lg font-semibold">{{ $rental['rental_days'] }} dias</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-300">Entrega</p>
                                <p class="mt-2 text-lg font-semibold">{{ $rental['delivery_city'] }}</p>
                            </div>
                        </div>
                    </div>
                </article>

                <aside class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="text-xl font-semibold text-slate-900">Pago y aceptacion</h3>
                    <div class="mt-6 space-y-4 border-b border-slate-200 pb-6 text-sm text-slate-600">
                        <div class="flex items-center justify-between gap-4">
                            <span>Valor del alquiler</span>
                            <strong class="text-slate-900">${{ number_format($rental['total_amount'], 0, ',', '.') }}</strong>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <span>Deposito de garantia</span>
                            <strong class="text-slate-900">${{ number_format($rental['deposit_amount'], 0, ',', '.') }}</strong>
                        </div>
                    </div>

                    <form
                        method="POST"
                        action="{{ route('rentals.store') }}"
                        class="mt-6 space-y-5"
                        x-data="{ acceptedTerms: @js((bool) old('accept_terms')) }"
                    >
                        @csrf

                        <div class="rounded-2xl bg-slate-50 p-4 text-sm leading-6 text-slate-700">
                            <p class="font-medium text-slate-900">Terminos y condiciones</p>
                            <p class="mt-1">
                                Consulta la version {{ $termsVersion }} antes de confirmar el alquiler.
                            </p>
                            <button
                                type="button"
                                x-data
                                x-on:click.prevent="$dispatch('open-modal', 'rental-terms-modal')"
                                class="mt-3 inline-flex items-center rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700"
                            >
                                Ver terminos y condiciones
                            </button>
                        </div>

                        <label class="flex gap-3 rounded-2xl border border-slate-200 p-4 text-sm text-slate-700">
                            <input
                                type="checkbox"
                                name="accept_terms"
                                value="1"
                                required
                                {{ old('accept_terms') ? 'checked' : '' }}
                                x-model="acceptedTerms"
                                class="mt-1 h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-500"
                            >
                            <span>
                                <span class="block font-medium text-slate-900">He leido y acepto los terminos y condiciones</span>
                                <span class="mt-1 block text-slate-500">
                                    Esta aceptacion es obligatoria para dejar constancia de tus responsabilidades como arrendatario.
                                </span>
                            </span>
                        </label>

                        @error('accept_terms')
                            <p class="text-sm font-medium text-rose-600">{{ $message }}</p>
                        @enderror

                        <div class="space-y-2">
                            <button
                                type="submit"
                                x-bind:disabled="!acceptedTerms"
                                x-bind:class="acceptedTerms ? 'bg-emerald-600 hover:bg-emerald-500' : 'cursor-not-allowed bg-slate-300'"
                                class="inline-flex w-full items-center justify-center rounded-2xl px-4 py-3 text-sm font-semibold text-white transition"
                            >
                                Confirmar alquiler
                            </button>

                            <p
                                x-show="!acceptedTerms"
                                x-cloak
                                class="text-sm text-slate-500"
                            >
                                Debes aceptar los terminos y condiciones para continuar.
                            </p>
                        </div>
                    </form>

                    @if ($latestTransaction)
                        <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                            Ultima aceptacion registrada el
                            <strong>{{ $latestTransaction->accepted_terms_at->format('d/m/Y H:i') }}</strong>.
                        </div>
                    @endif
                </aside>
            </section>
        </div>
    </div>

    <x-modal name="rental-terms-modal" maxWidth="2xl" focusable>
        <div class="p-6 sm:p-8">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Version {{ $termsVersion }}</p>
                    <h3 class="mt-2 text-2xl font-semibold text-slate-900">Terminos y condiciones</h3>
                </div>
                <button
                    type="button"
                    x-data
                    x-on:click.prevent="$dispatch('close-modal', 'rental-terms-modal')"
                    class="rounded-full border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 transition hover:border-slate-300 hover:text-slate-900"
                >
                    Cerrar
                </button>
            </div>

            <div class="mt-6 space-y-3 text-sm leading-7 text-slate-600">
                @foreach (explode("\n", $termsContent) as $term)
                    <p>{{ $term }}</p>
                @endforeach
            </div>
        </div>
    </x-modal>
</x-app-layout>
