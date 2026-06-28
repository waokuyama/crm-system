<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CustomerApiController extends Controller
{
    /**
     * 顧客一覧取得
     */
    public function index()
    {
        $customers = Cache::remember(
            'customers_api',
            now()->addMinutes(10),
            function () {
                return Customer::orderBy('id', 'desc')->get();
            }
        );

        return response()->json($customers);
    }

    /**
     * 顧客詳細取得
     */
    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }

    /**
     * 顧客登録
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create(
            $request->validated()
        );

        Cache::forget('customers_api');

        Log::info(
            'Redis cache deleted after create'
        );

        Log::info('API Customer Created', [
            'customer_id'   => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return response()->json([
            'message' => 'Customer created successfully',
            'data'    => $customer
        ], 201);
    }

    /**
     * 顧客更新
     */
    public function update(
        UpdateCustomerRequest $request,
        Customer $customer
    )
    {
        $customer->update(
            $request->validated()
        );

        Cache::forget('customers_api');

        Log::info(
            'Redis cache deleted after update'
        );

        Log::info('API Customer Updated', [
            'customer_id'   => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return response()->json([
            'message' => 'Customer updated successfully',
            'data'    => $customer
        ], 200);
    }

    /**
     * 顧客削除
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        Cache::forget('customers_api');

        Log::info(
            'Redis cache deleted after delete'
        );

        Log::info('API Customer Deleted', [
            'customer_id'   => $customer->id,
            'customer_name' => $customer->name,
        ]);

        return response()->json([
            'message' => 'Customer deleted successfully'
        ], 200);
    }
}
