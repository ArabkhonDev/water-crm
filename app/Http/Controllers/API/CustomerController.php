<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        return response()->json([
            'customers'=>Customer::orderBy('name', 'desc')->paginate(10),
        ]);
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

        return response()->json([
            'customers'=>Customer::orderBy('name', 'desc')->paginate(10),
            'message'=> "Customer Successfuly created"
        ]);
    }

    public function show(Customer $customer)
    {
        return response()->json([
            'customer'=> $customer
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:customers',
            'address' => 'required',
        ]);

        $customer->update([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        return response()->json([
            'customer'=>$customer,
            'message'=> "Customer Successfuly updated"
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'customer id'=> $customer->id,
            'message' => 'Customer Successfuly deleted'
        ]);
    }
}
