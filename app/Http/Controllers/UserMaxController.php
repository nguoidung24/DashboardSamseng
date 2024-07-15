<?php

namespace App\Http\Controllers;

use App\Services\UserMaxService;
use Illuminate\Http\Request;

class UserMaxController extends Controller
{

    // 3 - Xem
    // 2 - Xem | Thêm 
    // 1 - Xem | Thêm | Sửa | Xóa 
    // 0 - Xem | Thêm | Sửa | Thêm user 
    protected $userMaxService;

    public function __construct(UserMaxService $userMaxService)
    {
        $this->userMaxService = $userMaxService;
    }

    public function index(Request $request)
    {

        $action = $request->get('action');

        if ($action == 'toCreate') {
            $response = $this->userMaxService->toCreate();
            return view('user-max.add', $response);
        }
        if ($action == 'toDetail') {
            $id      = $request->get('id');
            $response = $this->userMaxService->toDetail($id);
            return view('user-max.edit', $response);
        }
        if ($action == 'edit') {
            $att              = [];
            $id               = $request->get('id');
            $att['role']      = $request->get('role');
            $att['password']  = $request->get('password');
            $att['phone']     = $request->get('phone');

            if ($this->userMaxService->edit($att, $id)) {
                return redirect()->route('user-max')->with('success', 'Sửa tài khoản thành công');
            }
            return redirect()->route('user-max')->with('error', 'Sửa không thành công!');
        }

        if ($action == 'create') {
            $att              = [];
            $att['role']      = $request->get('role');
            $att['password']  = $request->get('password');
            $att['phone']     = $request->get('phone');

            if ($this->userMaxService->create($att)) {
                return redirect()->route('user-max')->with('success', 'Thêm tài khoản thành công');
            }
            return redirect()->route('user-max')->with('error', 'Có thể tài khoản đã tồn tại!');
        }
        if ($action == 'delete') {
            $id      = $request->get('id');
            if ($this->userMaxService->delete($id)) {
                return redirect()->route('user-max')->with('success', 'Xóa tài khoản thành công');
            }
            return redirect()->route('user-max')->with('error', 'Xóa tài khoản không thành công!');
        }

        $response = $this->userMaxService->list();
        return view('user-max.list', $response);
    }
}
