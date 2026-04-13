<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;

class PublicOrderController extends Controller
{
    public function index() {
        return view('public.search');
    }

    public function search(Request $request) {
        $request->validate(['invoice_number' => 'required']);
        $order = Order::with('evidence')->where('invoice_number', $request->invoice_number)->first();
        
        if(!$order) {
            return back()->with('error', 'Factura no encontrada.');
        }

        return view('public.search', compact('order'));
    }
}