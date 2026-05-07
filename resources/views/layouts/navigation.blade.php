<nav class="bg-white border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">

            <div class="flex items-center space-x-6">
                <a href="/" class="text-xl font-bold text-gray-800">
                    MiApp
                </a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="/admin" class="text-gray-700 hover:text-blue-600 font-medium">
                            Admin
                        </a>
                    @endif

                    @if(auth()->user()->role === 'arrendador')
                        <a href="/arrendador" class="text-gray-700 hover:text-blue-600 font-medium">
                            Arrendador
                        </a>
                        <a href="{{ route('landlord.requests.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">
                            Solicitudes
                        </a>
                    @endif

                    @if(auth()->user()->role === 'arrendatario')
                        <a href="/arrendatario" class="text-gray-700 hover:text-blue-600 font-medium">
                            Arrendatario
                        </a>
                    @endif
                @endauth
            </div>

            @auth
            <div class="flex items-center space-x-4">
                @if(auth()->user()->role === 'arrendatario')
                    <div class="relative" x-data="{ open: false }">
                        <button
                            type="button"
                            x-on:click="open = !open"
                            x-on:click.outside="open = false"
                            class="relative inline-flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-700 transition hover:border-gray-300 hover:text-blue-600"
                            aria-label="Ver notificaciones"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17H18a2 2 0 0 0 2-2v-1.586a1 1 0 0 0-.293-.707l-1.414-1.414A1 1 0 0 1 18 10.586V9a6 6 0 1 0-12 0v1.586a1 1 0 0 1-.293.707L4.293 12.707A1 1 0 0 0 4 13.414V15a2 2 0 0 0 2 2h3.143m5.714 0a3 3 0 1 1-5.714 0m5.714 0H9.143" />
                            </svg>

                            @if(($renterNotifications ?? collect())->isNotEmpty())
                                <span class="absolute -right-1 -top-1 inline-flex min-h-[1.25rem] min-w-[1.25rem] items-center justify-center rounded-full bg-rose-500 px-1 text-[0.65rem] font-bold text-white">
                                    {{ $renterNotifications->count() }}
                                </span>
                            @endif
                        </button>

                        <div
                            x-show="open"
                            x-cloak
                            x-transition
                            class="absolute right-0 z-50 mt-3 w-80 overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl"
                        >
                            <div class="border-b border-gray-100 px-5 py-4">
                                <p class="text-sm font-semibold text-gray-900">Notificaciones</p>
                                <p class="mt-1 text-xs text-gray-500">Aprobaciones y rechazos de tus solicitudes</p>
                            </div>

                            @if(($renterNotifications ?? collect())->isEmpty())
                                <div class="px-5 py-6 text-sm text-gray-500">
                                    Aun no tienes notificaciones sobre tus solicitudes.
                                </div>
                            @else
                                <div class="max-h-96 overflow-y-auto">
                                    @foreach ($renterNotifications as $notification)
                                        <a
                                            href="{{ route('rentals.create') }}"
                                            class="block border-b border-gray-100 px-5 py-4 transition hover:bg-gray-50"
                                        >
                                            <div class="flex items-start gap-3">
                                                <span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full {{ $notification['status'] === 'aprobada' ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                                <div class="min-w-0">
                                                    <p class="text-sm font-semibold text-gray-900">{{ $notification['title'] }}</p>
                                                    <p class="mt-1 text-sm leading-5 text-gray-600">{{ $notification['message'] }}</p>
                                                    <p class="mt-2 text-xs text-gray-400">{{ $notification['updated_at']->format('d/m/Y H:i') }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <span class="text-gray-700 font-medium">
                    {{ auth()->user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}"
                   class="bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Cerrar sesion
                    </button>
                </form>

            </div>
            @endauth

        </div>
    </div>
</nav>
