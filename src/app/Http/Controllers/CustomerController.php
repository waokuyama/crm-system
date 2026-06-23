<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
        ]);

        Log::info('Customer Created', [
            'user' => auth()->user()?->email,
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return redirect('/customers');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
        ]);

        Log::info('Customer Updated', [
            'user' => auth()->user()?->email,
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return redirect('/customers');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        Log::info('Customer Deleted', [
            'user' => auth()->user()?->email,
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
        ]);

        $customer->delete();

        return redirect('/customers');
    }
}
