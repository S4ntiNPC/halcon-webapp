<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-red-600">
            Papelera de Pedidos Archivados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <p class="mb-6 text-gray-600">Estos pedidos han sido borrados lógicamente del sistema. Puedes restaurarlos en cualquier momento.</p>

                <table class="w-full text-left border-collapse" border="1" cellpadding="10">
                    <tr class="bg-gray-100">
                        <th class="border-b py-2 px-4">Factura</th>
                        <th class="border-b py-2 px-4">Cliente</th>
                        <th class="border-b py-2 px-4">Estatus al archivar</th>
                        <th class="border-b py-2 px-4">Fecha de borrado</th>
                        <th class="border-b py-2 px-4 text-center">Acción</th>
                    </tr>
                    @forelse($orders as $order)
                    <tr>
                        <td class="border-b py-2 px-4 text-gray-500">{{ $order->invoice_number }}</td>
                        <td class="border-b py-2 px-4 text-gray-500">{{ $order->customer_name }}</td>
                        <td class="border-b py-2 px-4 text-gray-500">{{ $order->status }}</td>
                        <td class="border-b py-2 px-4 text-gray-500">{{ $order->deleted_at->format('d/m/Y H:i') }}</td>
                        <td class="border-b py-2 px-4 text-center">
                            <form action="{{ route('orders.restore', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded text-sm">
                                    Recuperar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No hay pedidos en la papelera.</td>
                    </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </div>
</x-app-layout>