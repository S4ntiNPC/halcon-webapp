<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nombre Completo:</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Correo Electrónico:</label>
                        <input type="email" name="email" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Contraseña temporal:</label>
                        <input type="password" name="password" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Departamento (Rol):</label>
                        <select name="role_id" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Selecciona un departamento...</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                        Guardar Usuario
                    </button>
                    <a href="{{ route('users.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>