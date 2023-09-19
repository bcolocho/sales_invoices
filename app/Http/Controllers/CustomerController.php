<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = customer::all();
        return view('customer.index', compact('customer'));
        
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:200',
            'email' => 'required|email|unique:customer',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:200',
        ]);

        Customer::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer successfully registered.');
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => 'required|string|max:200',
            'email' => 'required|email|unique:customer,email,' . $customer->id,
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:200',
        ]);

        $customer->update([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        return redirect()->route('customer.index')->with('success', 'Customer successfully updated.');
    }
}