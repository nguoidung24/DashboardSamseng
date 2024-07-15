<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $colorService;

    public function __construct(
        ColorService $colorService,
    ) {
        $this->colorService = $colorService;
    }
    public function list(Request $request)
    {

        $result = $this->colorService->list();
        return view('color.list', $result);
    }
    public function detail(Request $request)
    {
        $action = $request->get('action');
        $id     = $request->get('id');

        if ($action == 'edit') {
            $att           = [];
            $att['value']  = $request->get('value');
            $att['code']   = $request->get('code');

            if ($this->colorService->edit($att, $id)) {
                return redirect()->route('color')->with('success', 'Sửa thành công!');
            }
            return redirect()->route('color')->with('error', 'Sửa không thành công!');
        }

        if ($action == 'delete') {

            if ($this->colorService->delete($id)) {
                return redirect()->route('color')->with('success', 'Xóa thành công!');
            }
            return redirect()->route('color')->with('error', 'Xóa không thành công!');
        }

        $result = $this->colorService->detail($id);
        return view('color.detail', $result);
    }
    public function create(Request $request)
    {
        $action = $request->get('action');
        if ($action == 'create') {
            $att           = [];
            $att['value']  = $request->get('value');
            $att['code']   = $request->get('code');

            if ($this->colorService->create($att)) {
                return redirect()->route('color')->with('success', 'Thêm thành công!');
            }
            return redirect()->route('color')->with('error', 'Thêm không thành công!');
        }
        return view('color.create');
    }
}
