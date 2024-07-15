<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(
        OrderService $orderService,
    ) {
        $this->orderService = $orderService;
    }
    public function list(Request $request)
    {
        $att             = [];
        $att['page']     = $request->get('page', 1);
        $att['keyword']  = $request->get('keyword', null);

        $result = $this->orderService->list($att);
        return view('order-wait.list', $result);
    }
    public function detail(Request $request)
    {
        $att      = [];
        $action   = $request->get('action');
        if($action == 'agree') //agree = Đồng ý
        {

            

            $listId = $request->get('listId');
            $response = $this->orderService->agree($listId);
            if($response['success']) 
                return redirect()->route('order-wait')->with('success',$response['message']);
            return redirect()->route('order-wait')->with('error',$response['message']);
        }
        if($action == 'notAgree') //not agree = k đồng ý
        {
            $listId   = explode(',',$request->get('listId'));
            $note     = $request->get('note');
            if($this->orderService->notAgree($listId, $note)) 
                return redirect()->route('order-wait')->with('success','Hoàn thành');
            return redirect()->route('order-wait')->with('error','Có lỗi xảy ra 💢');
        }

        $att['customer_id'] = $request->get('customer_id');
        $att['order_date']  = $request->get('order_date');
        $response           = $this->orderService->detail($att);
        return view('order-wait.detail', $response);
    }
    public function craete(Request $request)
    {
        $result = null;
        return view('order-wait.list', $result);
    }
}