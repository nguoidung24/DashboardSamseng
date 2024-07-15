<?php

namespace App\Http\Controllers;

use App\Services\OrderDeliveringService;
use Illuminate\Http\Request;

class OrderDeliveringController extends Controller
{
    protected $orderDeliveringService;

    public function __construct(
        OrderDeliveringService $orderDeliveringService,
    ) {
        $this->orderDeliveringService = $orderDeliveringService;
    }
    public function list(Request $request)
    {
        $att             = [];
        $att['page']     = $request->get('page', 1);
        $att['keyword']  = $request->get('keyword', null);

        $result = $this->orderDeliveringService->list($att);
        return view('order-delivering.list', $result);
    }
    public function detail(Request $request)
    {
        $att                 = [];
        $action              = $request->get('action');
        $att['order_date']   = $request->get('order_date');
        $att['customer_id']  = $request->get('customer_id');

        if ($action == 'success') {
            if ($this->orderDeliveringService->success($att)) {
                return redirect()->route('order-delivering')->with('success', 'Hoàn thành');
            }
            return redirect()->route('order-delivering')->with('error', 'Có lỗi xảy ra');
        }
        if ($action == 'fail') {
            if ($this->orderDeliveringService->fail($att)) {
                return redirect()->route('order-delivering')->with('success', 'Hoàn thành');
            }
            return redirect()->route('order-delivering')->with('error', 'Có lỗi xảy ra');
        }
        return redirect()->route('order-delivering');
    }
    public function craete(Request $request)
    {
        $result = null;
        return view('order-delivering.list', $result);
    }
}
