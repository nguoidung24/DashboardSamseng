<?php

namespace App\Http\Controllers;

use App\Services\OutstandingService;
use Illuminate\Http\Request;

class OutstandingController extends Controller
{
    protected $outstandingService;

    public function __construct(
        OutstandingService $outstandingService,
    ) {
        $this->outstandingService = $outstandingService;
    }
    public function list(Request $request)
    {
        $att             = [];
        $att['page']     = $request->get('page', 1);
        $att['keyword']  = $request->get('keyword', null);

        $result = $this->outstandingService->list($att);
        return view('outstanding.list', $result);
    }
    public function detail(Request $request)
    {
        $action = $request->get('action');
        if ($action  == 'delete') {
            $id = $request->get('id');
            if ($this->outstandingService->detail($id, 'delete')) {
                return redirect()->route('outstanding')->with('success', 'Xóa thành công!');
            } else {
                return redirect()->route('outstanding')->with('error', 'Xóa thất bại!');
            }
        }
        return redirect()->route('outstanding');
    }
    public function create(Request $request)
    {
        $action = $request->get('action');
        $att    = [];

        if ($action  == 'create') {
            $images                     = explode(',', $request->get('image', '.$tach_ra$.'));
            unset($images[0]);

            $att['name']                = $request->get('name');
            $att['button']              = $request->get('button');
            $att['big_text']            = $request->get('text_1');
            $att['big_image']           = explode(',', $request->get('image', '.$tach_ra$.'))[0];
            $att['button_link']         = $request->get('button_link_1');
            $att['smaill_text']         = $request->get('text_2') . '$tach_ra$' . $request->get('text_3') . '$tach_ra$' . $request->get('text_4') . '$tach_ra$' . $request->get('text_5');
            $att['small_image']         = str_replace(',', '$tach_ra$', implode(',', $images));
            $att['small_button_link']   = $request->get('button_link_2') . '$tach_ra$' . $request->get('button_link_3') . $request->get('button_link_4') . $request->get('button_link_5');

            if ($this->outstandingService->create($att, 'create')) {
                return redirect()->route('outstanding')->with('success', 'Thêm thành công!');
            }
            return redirect()->route('outstanding')->with('error', 'Thêm không thành công!');
        }

        $result = $this->outstandingService->create();
        return view('outstanding.create', $result);
    }
}
