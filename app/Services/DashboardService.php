<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getDashboardData()
    {
        $response  = [];
        $year      = date("Y");
        $month     = date("m");

        $totalQuantity = Order::where('status', 3)
            ->whereYear('payment_date', $year)
            ->sum('quantity');


        $totalAmount = Order::where('status', 3)
            ->whereYear('payment_date', $year)
            ->select(DB::raw('SUM(quantity * price) as total_amount'))
            ->pluck('total_amount')
            ->first();

        $totalCustomers = Order::where('status', 3)
            ->whereYear('payment_date', $year)
            ->distinct('customer_id')
            ->count('customer_id');

        $prvTotalQuantity = Order::where('status', 3)
            ->whereYear('payment_date', $year - 1)
            ->sum('quantity');


        $prvTotalAmount = Order::where('status', 3)
            ->whereYear('payment_date', $year - 1)
            ->select(DB::raw('SUM(quantity * price) as total_amount'))
            ->pluck('total_amount')
            ->first();

        $prvTotalCustomers = Order::where('status', 3)
            ->whereYear('payment_date', $year - 1)
            ->distinct('customer_id')
            ->count('customer_id');


        $response['totalQuantity']            = $totalQuantity;
        $response['totalAmount']              = $totalAmount;
        $response['totalCustomers']           = $totalCustomers;
        $response['compareTotalQuantity']     = $totalQuantity - $prvTotalQuantity;
        $response['compareTotalAmount']       = $totalAmount - $prvTotalAmount;
        $response['compareTotalCustomers']    = $totalCustomers - $prvTotalCustomers;
        $response['chartData']                = $this->getChartData();
        // dd($response);
        return $response;
    }
    public function getOrderCounter()
    {
        $response                     = [];
        $response['orderAwait']       = $this->getOrderAwaitCouter('1');
        $response['orderDelivering']  = $this->getOrderAwaitCouter('2');
        return $response;
    }


    function getOrderAwaitCouter($status)
    {
        $groupOrder = Order::select(DB::raw('customer_id, order_date, SUM(price * quantity) as total_price,  SUM(quantity) as total_quantity'))
            ->where("status", "=", $status)
            ->groupBy('customer_id', 'order_date')
            ->orderBy('customer_id')
            ->orderBy('order_date')
            ->get();

        return count($groupOrder);
    }
    function getChartData()
    {
        $year                 = date("Y");
        $month                = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $data                 = [];
        $data['totalOrders']  = [];
        $data['totalAmount']  = [];

        foreach ($month as $_month) {
            $totalOrders =  Order::where('status', 3)
                ->whereYear('payment_date', $year)
                ->whereMonth('payment_date', $_month)
                ->sum('quantity');



            $totalAmount = Order::where('status', 3)
                ->whereYear('payment_date', $year)
                ->whereMonth('payment_date', $_month)
                ->select(DB::raw('SUM(quantity * price) as total_amount'))
                ->pluck('total_amount')
                ->first();

            $data['totalOrders'][$_month] = $totalOrders;
            if ($totalAmount)
                $data['totalAmount'][$_month] = $totalAmount;
            else
                $data['totalAmount'][$_month] = '0';
        }
        $data['totalAmount'] = implode(',', $data['totalAmount']);
        $data['totalOrders'] = implode(',', $data['totalOrders']);
        return $data;
    }
}
