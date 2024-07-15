<?php

namespace App\Services;

use App\Models\Color;

class ColorService
{
    public function list()
    {
        $data            = [];
        $colors       = Color::orderBy('color_id', 'DESC')->get();
        $data['data']    = $colors;

        return $data;
    }
    public function create($att)
    {
        return Color::create($att);
    }

    public function detail($id)
    {
        $data         = [];
        $data['data'] = Color::where('color_id', '=', $id)->first();
        return  $data;
    }

    public function edit($att, $id)
    {
        return  Color::where('color_id', '=', $id)->update($att);
    }

    public function delete($id)
    {
        return  Color::where('color_id', '=', $id)->delete();
    }
}
