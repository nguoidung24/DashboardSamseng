<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function list($att)
    {
        $data            = [];
        $data['data']    = [];
        // $categoris        = Order::orderBy('order_id', 'DESC')
        //     ->where('status', '=', '1')
        //     ->get();

        $groupOrder = Order::select(DB::raw('customer_id, order_date, SUM(price * quantity) as total_price,  SUM(quantity) as total_quantity'))
            ->where("status", "=", "1")
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

    public function detail($att)
    {
        $response                   = [];
        $response['totalAmount']    = 0;
        $response['totalQuantity']  = 0;
        $response['data']           = Order::where($att)->with(['product'])->get();

        foreach ($response['data'] as $item) {
            $response['totalAmount'] += $item->price * $item->quantity;
        }
        foreach ($response['data'] as $item) {
            $response['totalQuantity'] += $item->quantity;
        }

        return $response;
    }

    public function agree($listId)
    {
        foreach ($listId as $key => $value) {
            $findOrder = Order::find($value);
            $findProduct = Products::find($findOrder->product_id);

            if ($findProduct->quantity < $findOrder->quantity) {
                return ['success' => false, 'message' => 'Số lượng trong kho không đủ 💢'];
            }
        }
        foreach ($listId as $key => $value) {
            $findOrder         = Order::find($value);
            $product           = Products::find($findOrder->product_id);
            $product->quantity = $product->quantity - $findOrder->quantity;
            $product->sold     = $product->sold + $findOrder->quantity;
            $product->save();

            $order = Order::find($value);
            $order->status = 2;
            $order->save();
        }
        return  ['success' => true, 'message' => 'Đã duyệt đơn ✔'];
    }
    public function notAgree($listId, $note)
    {
        foreach ($listId as $key => $value) {
          

            $order = Order::find($value);
            $order->status = -1;
            $order->note = $note;
            $order->save();
        }
        return true;
    }


    // { id: -1, value: 'Đơn bị hủy' },
    // { id: 2, value: 'Đang Giao' },
    // { id: 1, value: 'Chờ Duyệt' },
    // { id: 3, value: 'Đã Giao' },
    // { id: 4, value: 'Thất Bại' },
}
