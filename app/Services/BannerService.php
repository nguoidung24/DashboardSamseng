<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Posts;
use App\Models\Products;

class BannerService
{
    public function list($att)
    {
        $data            = [];
        $categoris       = Banner::orderBy('id', 'DESC')->get();
        $data['data']    = $categoris;

        return $data;
    }
    public function create($att, $action)
    {

        if($action == 'create'){
            // dd($att);
            return Banner::create($att);
        }

        $data               = [];
        $data['posts']      = Posts::get();
        $data['products']    = Products::get();

        return $data;
    }

    public function delete($id)
    {
        return Banner::where('id','=', $id)->delete();
    }
}
