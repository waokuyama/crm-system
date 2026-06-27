<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerApiController extends Controller
{
    /**
     * 顧客一覧取得
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();

        return response()->json($customers, 200);
    }

    /**
     * 顧客詳細取得
     */
    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }
}
