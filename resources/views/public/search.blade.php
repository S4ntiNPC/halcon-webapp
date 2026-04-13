<h1>Rastrear Pedido Halcón</h1>
@if(session('error')) <p style="color:red;">{{ session('error') }}</p> @endif

<form action="{{ route('public.search') }}" method="POST">
    @csrf
    <label>Número de Factura:</label>
    <input type="text" name="invoice_number" required>
    <button type="submit">Buscar</button>
</form>

@if(isset($order))
    <hr>
    <h3>Resultados para: {{ $order->invoice_number }}</h3>
    <p><strong>Estatus Actual:</strong> {{ $order->status }}</p>

    @if($order->status == 'In process')
        <p>Proceso: El pedido está siendo preparado en almacén.</p>
        <p>Fecha de actualización: {{ $order->updated_at->format('d/m/Y H:i') }}</p>
    @elseif($order->status == 'Delivered' && $order->evidence && $order->evidence->delivered_photo_url)
        <p><strong>Evidencia de Entrega:</strong></p>
        <img src="{{ asset('storage/' . $order->evidence->delivered_photo_url) }}" width="300" alt="Evidencia">
    @endif
@endif