<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService,
    ) {
        $this->categoryService = $categoryService;
    }
    public function list(Request $request)
    {
        $att             = [];
        $att['page']     = $request->get('page', 1);
        $att['keyword']  = $request->get('keyword', null);

        $result = $this->categoryService->list($att);
        return view('categories.list', $result);
    }
    public function detail(Request $request)
    {
        $att                   = [];
        $att['category_id']    = $request->get('category_id');
        $action                = $request->get('action');

        if ($action == 'delete') {
            if ($this->categoryService->detail($att, 'delete')) {
                return redirect()->route('categories')->with('success', 'Thành công');
            }
            return redirect()->route('categories')->with('error', 'Không thành công');
        }
        if ($action == 'edit') {
            $att['category_name']     = $request->get('category_name');
            $att['menu_id']           = $request->get('menu_id');
            $att['thumbnail']         = $request->file('thumbnail');

            if ($this->categoryService->detail($att, 'edit')) {
                return redirect()->route('categories')->with('success', 'Thành công');
            }
            return redirect()->route('categories')->with('error', 'Không thành công');
        }

        $data = $this->categoryService->detail($att, '');
        return view('categories.detail', $data);
    }
    public function create(Request $request)
    {
        $action  = $request->get('action');
        $data    = $this->categoryService->create(null);
        if ($action == 'create') {
            $att = [
                'category_id'     => $request->get('category_id'),
                'category_name'   => $request->get('category_name'),
                'menu_id'         => $request->get('menu_id'),
                'thumbnail'       => $request->file('thumbnail'),
            ];

            if ($this->categoryService->create($att, 'create')) {
                return redirect()->route('categories')->with('success', 'Thành công');
            }
            return redirect()->route('categories')->with('error', 'Không thành công');
        }

        return view('categories.create', $data);
    }
}
