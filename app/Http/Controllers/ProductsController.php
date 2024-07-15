<?php

namespace App\Http\Controllers;

use App\Services\ProductsService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productsService;

    public function __construct(ProductsService $productsService)
    {
        $this->productsService = $productsService;
    }
    public function list(Request $request)
    {
        $att             = [];
        $att['page']     = $request->get('page', 1);
        $att['keyword']  = $request->get('keyword', null);

        $result = $this->productsService->list($att);
        return view('products.list', $result);
    }
    public function detail(Request $request)
    {
        $att                  = [];
        $result               = [];
        $att['product_id']    = $request->get('product_id', '');
        $action               = $request->get('action', '');

        if ($action == 'edit') {

            $attribute = [
                "product_id"      => $att['product_id'],
                "category_id"     => $request->get('category_id', ''),
                "color_id"        => $request->get('color_id', ''),
                "group_id"        => $request->get('group_id', ''),
                "product_name"    => $request->get('product_name', ''),
                "price"           => $request->get('price', ''),
                "sold"            => $request->get('sold', ''),
                "rating"          => $request->get('rating', ''),
                "total_rating"    => $request->get('total_rating', ''),
                "status"          => $request->get('status', ''),
                "discount"        => $request->get('discount', ''),
                "quantity"        => $request->get('quantity', ''),
                "description"     => $request->get('description', ''),
                "post_id"         => $request->get('post_id', ''),
                "product_type"    => implode(',', $request->get('product_type', [])),
            ];
            if ($attribute['color_id']) {
                $attribute['color_id'] = explode('|', $attribute['color_id'])[0];
            }

            if ($this->productsService->detail($attribute, 'edit')) {
                return redirect()->route('products')->with('success', 'Thành công!');
            }
            return redirect()->route('products')->with('error', 'Không thành công!');
        }




        if ($action == 'delete') {
            $product_id = $request->get('product_id', '');
            $attribute                =  [];
            $attribute['product_id']  = $product_id;

            if ($this->productsService->detail($attribute, 'delete')) {
                return redirect()->route('products')->with('success', 'Thành công!');
            }

            return redirect()->route('products')->with('error', 'Không thành công!');
        }


        $result['list']       = $this->productsService->detail($att);
        $result['product']    = $result['list']['product'];
        return view('products.detail', $result);
    }
    public function create(Request $request)
    {
        $data            = [];
        $data['genID']   = $this->genID();
        $data['list']    = $this->productsService->create(null);

        $action          = $request->get('action', '');

        if ($action == 'create') {
            $att = [
                "product_id"      => $request->get('product_id', ''),
                "category_id"     => $request->get('category_id', ''),
                "color_id"        => $request->get('color_id', ''),
                "group_id"        => $request->get('group_id', ''),
                "product_name"    => $request->get('product_name', ''),
                "price"           => $request->get('price', ''),
                "sold"            => $request->get('sold', ''),
                "rating"          => $request->get('rating', ''),
                "total_rating"    => $request->get('total_rating', ''),
                "status"          => $request->get('status', ''),
                "discount"        => $request->get('discount', ''),
                "quantity"        => $request->get('quantity', ''),
                "description"     => $request->get('description', ''),
                "post_id"         => $request->get('post_id', ''),
                "product_type"    => implode(',', $request->get('product_type', [])),
                "images"          => $request->get('images', ''),
                "thumbnail"       => explode(',', $request->get('images', ','))[0]
            ];
            if ($att['color_id']) {
                $att['color_id'] = explode('|', $att['color_id'])[0];
            }
            // dd($att);
            if ($this->productsService->create($att, 'create')) {
                return redirect()->route('products')->with('success', 'Thành công!');
            }

            return redirect()->route('products')->with('error', 'Không thành công!');
        }




        return view('products.create', $data);
    }
    public function images(Request $request)
    {
        $att                  = [];
        $action               = $request->get('action', '');
        $att['product_id']    = $request->get('product_id', '');

        if ($action == 'thumbnail') {
            $att['file']   = $request->file('file');

            if ($this->productsService->thumbnail($att))
                return redirect()->route('product-detail', ['product_id' => $att['product_id']])->with('success', 'Thành công');
            return redirect()->route('product-detail',  ['product_id' => $att['product_id']])->with('success', 'Không thành công');
        }

        if ($action == 'deleteImage') {
            $att['deleteUrl'] =  $request->get('deleteUrl');

            if ($this->productsService->deleteImage($att))
                return redirect()->route('product-detail', ['product_id' => $att['product_id']])->with('success', 'Thành công');
            return redirect()->route('product-detail', ['product_id' => $att['product_id']])->with('success', 'Không thành công');
        }

        if ($action == 'addImage') {
            $att['file'] =  $request->file('file');
            
            if ($this->productsService->addImage($att))
                return redirect()->route('product-detail', ['product_id' => $att['product_id']])->with('success', 'Thành công');
            return redirect()->route('product-detail', ['product_id' => $att['product_id']])->with('success', 'Không thành công');
        }

        if ($action == 'addImages') {

            return;
        }
    }
    function genID()
    {
        return rand(111, 999) . time();
    }
}
