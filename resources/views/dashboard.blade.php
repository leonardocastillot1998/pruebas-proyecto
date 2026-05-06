<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel principal
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4">
                    Bienvenido, {{ auth()->user()->name }}
                </h3>

                <p class="mb-2">
                    <strong>Correo:</strong> {{ auth()->user()->email }}
                </p>

                <p class="mb-2">
                    <strong>Rol:</strong> {{ auth()->user()->role }}
                </p>

                <p class="mb-2">
                    <strong>Documento:</strong> {{ auth()->user()->document }}
                </p>

                <p>
                    <strong>Teléfono:</strong> {{ auth()->user()->phone }}
                </p>

            </div>

        </div>
    </div>
</x-app-layout>
