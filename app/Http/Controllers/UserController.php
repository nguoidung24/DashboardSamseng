<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    // 3 - Xem
    // 2 - Xem | Thêm 
    // 1 - Xem | Thêm | Sửa | Xóa 
    // 0 - Xem | Thêm | Sửa | Thêm user 

    public function index(Request $request)
    {
        $adminID   = Session::get('adminID');
        $user      = User::where('id', '=', $adminID)->first();
        $data      = [];
        try {
            $role      = $user['role'];
        } catch (Exception $e) {
            $role      = 3;
        }
        $data['role']  = $this->role()[$role];

        return view('user.info', $data);
    }

    function role()
    {
        return [
            3 => 'Xem',
            2 => 'Xem | Thêm',
            1 => 'Xem | Thêm | Sửa | Xóa',
            0 => 'Xem | Thêm | Sửa | Thêm user',

        ];
    }
}
