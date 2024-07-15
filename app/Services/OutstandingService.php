<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Outstanding;
use App\Models\Posts;
use App\Models\Products;

class OutstandingService
{
    public function list($att)
    {
        $data            = [];
        $categoris        = Outstanding::orderBy('id', 'DESC')->get();
        $data['data']    = $categoris;

        return $data;
    }

    public function create($att = null, $action = '')
    {
        $result = [];

        if ($action == 'create') {
            return Outstanding::create($att);
        }

        $result['products'] = Products::all();
        $result['categories'] = Category::all();
        $result['posts'] = Posts::all();
        return $result;
    }

    public function detail($id = null, $action = '')
    {
        if ($action == 'delete') {
            return Outstanding::where('id', $id)->delete();
        }

        return false;
    }
}
