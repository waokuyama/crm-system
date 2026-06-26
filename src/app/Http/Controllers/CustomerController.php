<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * 顧客一覧
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $customers = Customer::query();

        if (!empty($keyword)) {
            $customers->where(
                'name',
                'like',
                '%' . $keyword . '%'
            )
            ->orWhere(
                'company',
                'like',
                '%' . $keyword . '%'
            );
        }

        $customers = $customers
            ->orderBy('id', 'desc')
            ->paginate(5);

        $customers->appends([
            'keyword' => $keyword
        ]);

        return view(
            'customers.index',
            compact(
                'customers',
                'keyword'
            )
        );
    }

    /**
     * 新規作成画面
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * 顧客登録
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'company' => $request->company,
        ]);

        Log::info('Customer Created', [
            'user'          => auth()->user()?->email,
            'customer_id'   => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return redirect('/customers');
    }

    /**
     * 編集画面
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view(
            'customers.edit',
            compact('customer')
        );
    }

    /**
     * 更新処理
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'company' => $request->company,
        ]);

        Log::info('Customer Updated', [
            'user'          => auth()->user()?->email,
            'customer_id'   => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return redirect('/customers');
    }

    /**
     * 削除処理
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        Log::info('Customer Deleted', [
            'user'          => auth()->user()?->email,
            'customer_id'   => $customer->id,
            'customer_name' => $customer->name,
        ]);

        $customer->delete();

        return redirect('/customers');
    }
}
