<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Customers::create($request->all());
        

        return redirect()->route('customers.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customers = Customers::find($id);
        return view('customers.show', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $customer = Customers::find($id);

        return view('customers.edit', compact('customer'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $customer = Customers::find($id);
        $customer->customer_name = $request->post('customer_name');
        $customer->email = $request->post('email');
        $customer->phone = $request->post('phone');
        $customer->address = $request->post('address');
        $customer->update();
        

        return redirect()->route('customers.index')->with('success', 'Client successfully updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $customer = Customers::find($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer successfully deleted.');

    }
   


}
