<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index')->with(['customers'=> $customers]);
    }

  
    public function create()
    {
        return view('customers.create');
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:customers',
            'address' => 'required',
        ]);

        $customer = Customer::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        return to_route('customers.index');
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit')->with(['customer'=>$customer]);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        return to_route('customers.edit')->with(['message' => "Muvaffiqiyatli o'zgartirildi"]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with(['message'=> "Muvaffiqiyatli o'chirildi "]);
    }
}
