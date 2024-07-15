<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class OrderDeliveringService
{
    public function list($att)
    {
        $data            = [];
        $data['data']    = [];
        // $categoris        = Order::orderBy('order_id', 'DESC')
        //     ->where('status', '=', '1')
        //     ->get();

        $groupOrder = Order::select(DB::raw('customer_id, order_date, SUM(price * quantity) as total_price,  SUM(quantity) as total_quantity'))
            ->where("status", "=", "2")
            ->groupBy('customer_id', 'order_date')
            ->orderBy('customer_id')
            ->orderBy('order_date')
            ->get();


        foreach ($groupOrder as $order) {

            $getOrder = Order::where([
                "customer_id" => $order->customer_id,
                "order_date"  => $order->order_date,
            ])->first();

            $getOrder['total_quantity']  = $order['total_quantity'];
            $getOrder['total_price']     = $order['total_price'];

            array_push($data['data'], $getOrder);
        }
        return $data;
    }
    public function success($att)
    {
        $query = Order::where($att)->get();
        foreach ($query as $row) {
            $row->status = 3;
            $row->payment_date = date('Y-m-d');
            $row->save();
        }
        return true;
    }
    public function fail($att)
    {
        $query = Order::where($att)->get();
        foreach ($query as $row) {
            
            $product           = Products::find($row->product_id);
            $product->quantity = $product->quantity + $row->quantity;
            $product->sold     = $product->sold - $row->quantity;
            $product->save();




            $row->status = 4;
            $row->save();
        }
        return true;
    }




    // { id: -1, value: 'Đơn bị hủy' },
    // { id: 2, value: 'Đang Giao' },
    // { id: 1, value: 'Chờ Duyệt' },
    // { id: 3, value: 'Đã Giao thành công' },
    // { id: 4, value: 'Thất Bại' },
}
