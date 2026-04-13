<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actualizar Pedido: {{ $order->invoice_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('orders.update', $order) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    
                    <label class="block font-medium text-sm text-gray-700">Cambiar Estatus:</label>
                    <select name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                        <option value="In process" {{ $order->status == 'In process' ? 'selected' : '' }}>In process</option>
                        <option value="In route" {{ $order->status == 'In route' ? 'selected' : '' }}>In route</option>
                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    </select><br><br>

                    <div style="background: #f0f0f0; padding: 15px; border-radius: 5px;">
                        <p><strong>Evidencia Fotográfica</strong></p>
                        <p><small class="text-gray-600">Sube una foto si el estatus cambia a "In route" (Foto de unidad cargada) o "Delivered" (Foto de entrega final).</small></p>
                        <input type="file" name="photo" accept="image/*" class="mt-3">
                    </div><br>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Guardar Cambios
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>