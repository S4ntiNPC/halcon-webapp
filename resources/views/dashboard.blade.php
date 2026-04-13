<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Principal - Halcón') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">¡Bienvenido al sistema, has iniciado sesión correctamente!</p>
                    
                    <h3 class="text-lg font-bold mt-6 mb-2">Accesos Rápidos:</h3>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>
                            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">
                                Gestión de Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">
                                Gestión de Pedidos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orders.archived') }}" class="text-blue-600 hover:underline">
                                Papelera de Pedidos Archivados
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>