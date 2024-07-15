<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class MyAuth
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        $isLogin   = Session::get('isLogin');
        $adminID   = Session::get('adminID');
        $user      = User::where('id', '=', $adminID)->first();
        try {
            $role      = $user['role'];
        } catch (Exception $e) {
            $role      = 3;
        }

        $pathInfo  = explode('/', $request->getPathInfo());
        if ($isLogin) {
            if (in_array($pathInfo[count($pathInfo) - 1], $this->role()[$role])) {
                return $next($request);
            } else {
                try {
                    return redirect()->route($pathInfo[1])->with('alert', 'Tài khoản của bạn không có quyền truy cập hành động này 💢');
                } catch (Exception $e) {
                    return redirect()->route('dashboard')->with('alert', 'Tài khoản của bạn không có quyền truy cập hành động này 💢');
                }
            }
        } else {
            if ($pathInfo[1] == 'login') {
                return $next($request);
            }
            return redirect("/login");
        }
    }
    function role()
    {
        $page = [
            '',
            '/',
            'user',
            'login',
            'posts',
            'color',
            'banner',
            'contact',
            'products',
            'dashboard',
            'categories',
            'order-wait',
            'outstanding',
            'order-delivering'
        ];
        return [
            3 => [...$page],                                                  // Xem
            2 => [...$page, 'create'],                                        // Xem | Thêm 
            1 => [...$page, 'create', 'detail','delete'],                     // Xem | Thêm | Sửa | Xóa 
            0 => [...$page, 'create', 'detail','delete', 'max'],              // Xem | Thêm | Sửa | Thêm user 

        ];
    }
}
