<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Evidence;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        // Ordenadas de la última a la primera
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function create() {
        return view('orders.create');
    }

    public function store(Request $request) {
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Pedido creado.');
    }

    public function show(Order $order) {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order) {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order) {
        $order->update($request->except('photo'));

        // Lógica para guardar la fotografía dependiendo del estatus
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('evidences', 'public');
            $evidence = Evidence::firstOrCreate(['order_id' => $order->id]);
            
            if ($request->status == 'In route') {
                $evidence->update(['loaded_unit_photo_url' => $path]);
            } elseif ($request->status == 'Delivered') {
                $evidence->update(['delivered_photo_url' => $path]);
            }
        }

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado.');
    }

    public function destroy(Order $order) {
        $order->delete(); // Aplica el Soft Delete
        return redirect()->route('orders.index')->with('success', 'Pedido archivado (Borrado lógico).');
    }

    public function archived() {
        $orders = Order::onlyTrashed()->get();
        return view('orders.archived', compact('orders'));
    }

    public function restore($id) {
        Order::withTrashed()->find($id)->restore();
        return redirect()->route('orders.archived')->with('success', 'Pedido restaurado.');
    }
}