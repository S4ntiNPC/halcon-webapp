<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="{{ route('users.create') }}" class="text-blue-600 hover:underline mb-4 inline-block">Crear Nuevo Usuario</a>
                
                <table class="w-full text-left border-collapse" border="1" cellpadding="10" style="margin-top: 10px;">
                    <tr>
                        <th class="border-b py-2">Nombre</th>
                        <th class="border-b py-2">Email</th>
                        <th class="border-b py-2">Departamento (Rol)</th>
                        <th class="border-b py-2">Estatus</th>
                        <th class="border-b py-2">Acciones</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td class="border-b py-2">{{ $user->name }}</td>
                        <td class="border-b py-2">{{ $user->email }}</td>
                        <td class="border-b py-2">{{ $user->role ? $user->role->name : 'Sin rol' }}</td>
                        <td class="border-b py-2">{{ $user->is_active ? 'Activo' : 'Inactivo' }}</td>
                        <td class="border-b py-2"><a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline">Editar</a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</x-app-layout>