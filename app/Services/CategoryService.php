<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\File;

class CategoryService
{
    public function list($att)
    {
        $data            = [];
        $categoris       = Category::with(['menu'])->orderBy('category_id', 'DESC')->get();
        $data['data']    = $categoris;

        return $data;
    }

    public function create($att, $action = '')
    {

        if ($action == 'create') {
            $att['thumbnail'] = $this->uploadFile($att['thumbnail']);
            return Category::create($att);
        }

        $data                 = [];
        $menu                 = Menu::get();

        $data['genID']        = $this->genID();
        $data['menu']         = $menu;

        return $data;
    }

    public function detail($att, $action = '')
    {

        if ($action == 'delete') {
            return Category::where('category_id','=',$att['category_id'])->delete();
        }

        if ($action == 'edit') {
            if($att['thumbnail']){
                $att['thumbnail'] = $this->uploadFile($att['thumbnail']);
            }else{
                unset($att['thumbnail']);
            }

            $category = Category::where('category_id','=', $att['category_id']);
            return $category->update($att);
        }


        $data                 = [];
        $menu                 = Menu::get();
        $category             = Category::where('category_id','=',$att['category_id'])->get()[0];
        $data['genID']        = $this->genID();
        $data['menu']         = $menu;
        $data['category']     = $category;


        return $data;
    }

    function genID()
    {
        return rand(111, 999) . time();
    }

    function uploadFile($file)
    {

        $path          = public_path('uploads');
        $fileName      = uniqid() . '.png';

        File::makeDirectory($path, $mode = 0777, true, true);
        $file->move($path, $fileName);

        return 'uploads/'.$fileName;
    }
}
