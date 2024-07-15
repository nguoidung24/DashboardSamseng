<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(
        PostService $postService,
    ) {
        $this->postService = $postService;
    }
    public function list(Request $request)
    {
        $data = [];
        $data['data'] = $this->postService->list();
        return view('posts.list', $data);
    }

    public function create(Request $request)
    {
        $data = [];
        $att  = [];
        $action = $request->get('action');
        if ($action == 'create') {
            $att['text_content']   = $request->get('text_content');
            $att['content']        = $request->get('content');
            $att['post_name']      = $request->get('post_name');

            if ($this->postService->create($att, 'create')) {
                return redirect()->route('posts')->with('success', 'Thêm thành công✨');
            }
            return redirect()->route('posts')->with('error', 'Thêm không thành công💢');
        }
        $data['postDefault'] = $this->postService->create();
        return view('posts.create', $data);
    }

    public function detail(Request $request)
    {
        $action    = $request->get('action');
        $id        = $request->get('id');
        $response  = []; 
        if ($action == 'delete') {
            if ($this->postService->detail($id, 'delete')) {
                return redirect()->route('posts')->with('success', 'Xóa thành công✨');
            }
            return redirect()->route('posts')->with('error', 'Xóa không thành công💢');
        }
        if ($action == 'edit') {
            $att['text_content']   = $request->get('text_content');
            $att['content']        = $request->get('content');
            $att['post_name']      = $request->get('post_name');
            $att['post_id']        = $request->get('post_id');

            if ($this->postService->detail($att, 'edit')) {
                return redirect()->route('posts')->with('success', 'Sửa thành công✨');
            }
            return redirect()->route('posts')->with('error', 'Sửa không thành công💢');
        }

        $response['post'] = $this->postService->detail($id);
        return view('posts.detail', $response);
    }
}
