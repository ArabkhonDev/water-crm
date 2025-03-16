<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->latest()->paginate(10);
        return view('orders.index')->with(['orders' => $orders]);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create')->with('customers', $customers);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'customer_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'is_paid' => 'sometimes|boolean'
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'is_paid' => $request->has('is_paid') ? 1 : 0,
        ]);

        return to_route('orders.index');
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function edit(Order $order)
    {
        return view('orders.edit')->with(['order'=>$order]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'is_paid' => $request->has('is_paid') ? 1 : 0,
        ]);

        return redirect()->route('orders.index')->with('success', 'To‘lov amalga oshirildi!');
    }

    public function destroy(string $id)
    {
        //
    }
}
