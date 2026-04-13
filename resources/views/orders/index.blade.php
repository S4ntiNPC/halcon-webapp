<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Pedidos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="{{ route('orders.create') }}" class="text-blue-600 hover:underline mb-4 inline-block">Crear Nuevo Pedido</a>
                
                <table class="w-full text-left border-collapse" border="1" cellpadding="10" style="margin-top: 10px;">
                    <tr>
                        <th class="border-b py-2">Factura</th>
                        <th class="border-b py-2">Cliente</th>
                        <th class="border-b py-2">Dirección</th>
                        <th class="border-b py-2">Estatus</th>
                        <th class="border-b py-2">Acciones</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td class="border-b py-2">{{ $order->invoice_number }}</td>
                        <td class="border-b py-2">{{ $order->customer_name }}</td>
                        <td class="border-b py-2">{{ $order->delivery_address }}</td>
                        <td class="border-b py-2">{{ $order->status }}</td>
                        <td class="border-b py-2">
                            <a href="{{ route('orders.edit', $order) }}" class="text-blue-600 hover:underline mr-2">Actualizar</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Seguro que deseas archivar este pedido?')">Archivar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
        </div>
    </div>
</x-app-layout>