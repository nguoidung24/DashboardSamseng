<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Posts;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class ProductsService
{
    // protected $productsRepository;

    // public function __construct(
    //     ProductRepository $productsRepository,
    // ) {
    //     $this->productsRepository = $productsRepository;
    // }
    public function list($att)
    {
        $data            = [];
        $products        = Products::with(['color', 'category'])->orderBy('product_id', 'DESC')->get();
        $data['data']    = $products;
        // $products        = Products::orderBy('product_id', 'DESC')->paginate(5);
        // $data['data']    = $products->items();
        // $data['total']   = $products->lastPage();
        // $data['page']    = $att['page'];


        return $data;
    }

    public function create($att, $action = '')
    {
        $data                =  [];
        $products            =  Products::get();
        $categories          =  Category::get();
        $colors              =  Color::get();
        $posts               =  Posts::get();

        $data['products']     =  $products;
        $data['categories']   =  $categories;
        $data['colors']       =  $colors;
        $data['posts']        =  $posts;

        if ($action == 'create') {
            return Products::create($att);
        }

        return $data;
    }
    public function detail($att, $action = '')
    {
        $data                 = [];
        $product_id           = $att['product_id'];

        if ($action == 'delete') {
            $product             = Products::where('product_id', '=', $product_id)->get()[0];
            $product->delete();
            return $product;
        }
        if ($action == 'edit') {
            unset($att['product_id']);
            $product             = Products::where('product_id', '=', $product_id);
            return $product->update($att);
        }

        $products             = Products::get();
        $categories           = Category::get();
        $colors               = Color::get();
        $posts                = Posts::get();

        $data['products']     = $products;
        $data['categories']   = $categories;
        $data['colors']       = $colors;
        $data['posts']        = $posts;

        $data['product']      = Products::where('product_id', '=', $product_id)->get()[0];

        return $data;
    }
    public function thumbnail($att){
        $file          = $att['file'];
        $product_id    = $att['product_id'];
        $path          = public_path('uploads');
        $fileName      = uniqid() . '.png';

        File::makeDirectory($path, $mode = 0777, true, true);
        $file->move($path, $fileName);

        $product       = Products::where('product_id', '=', $product_id);
        $product->update([
            'thumbnail' => 'uploads/'.$fileName
        ]);

        return true;
    }

    public function deleteImage($att){
        $deleteUrl     = $att['deleteUrl'];
        $product_id    = $att['product_id'];

        $findProduct       = Products::where('product_id', '=', $product_id)->get()[0];
        
        $images = explode(',',$findProduct->images);
        $key = array_search($deleteUrl, $images);
        unset($images[$key]);
        
        $findProduct->update([
            'images' => implode(',',$images)
        ]);

        return true;
    }


    public function addImage($att){
        $file          = $att['file'];
        $product_id    = $att['product_id'];
        $path          = public_path('uploads');
        $fileName      = uniqid() . '.png';

        File::makeDirectory($path, $mode = 0777, true, true);
        $file->move($path, $fileName);

        
        $product       = Products::where('product_id', '=', $product_id)->get()[0];

        if($product->images){
            $product->update([
                'images' => $product->images.',uploads/'.$fileName
            ]);
        }else{
            $product->update([
                'images' => 'uploads/'.$fileName
            ]);
        }
      

        return true;
    }
}
