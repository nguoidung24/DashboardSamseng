<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserMaxService
{
    public function list()
    {
        $data            = [];
        $data['data']    = User::orderBy('id', 'asc')->get();
        $data['roles']   = $this->role();
        return $data;
    }

    public function add()
    {
        $data            = [];
        $data['data']    = User::orderBy('id', 'asc')->get();
        $data['roles']   = $this->role();
        return $data;
    }
    public function toCreate()
    {
        $data            = [];
        $data['roles']   = $this->role();
        return $data;
    }
    public function toDetail($id)
    {
        $data            = [];
        $data['data']    = User::where('id', '=', $id)->first();
        $data['roles']   = $this->role();
        return $data;
    }
    public function create($att)
    {
        try {
            return User::create($att);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function edit($att,$id)
    {
        try {
            return User::where('id','=', $id)->update($att);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return User::where('id','=', $id)->delete();
        } catch (\Exception $e) {
            return false;
        }
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
