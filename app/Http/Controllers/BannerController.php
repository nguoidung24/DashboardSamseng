<?php

namespace App\Http\Controllers;

use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(
        BannerService $bannerService,
    ) {
        $this->bannerService = $bannerService;
    }
    public function list(Request $request)
    {
        $att             = [];
        $att['page']     = $request->get('page', 1);
        $att['keyword']  = $request->get('keyword', null);

        $result = $this->bannerService->list($att);
        return view('banner.list', $result);
    }
    public function detail(Request $request)
    {
        $action = $request->get('action');
        if ($action == 'delete') {
            $id = $request->get('id');
            if ($this->bannerService->delete($id)) {
                return redirect()->route('banner')->with('success', 'Thành công');
            }
            return redirect()->route('banner')->with('error', 'Không thành công');
        }
        return view('banner.detail');
    }
    public function create(Request $request)
    {
        $action = $request->get('action');
        if ($action == 'create') {
            $att = [
                'type'          => $request->get('type'),
                'image'         => str_replace(',', '$tach_ra$', $request->get('image', '')),
                'title'         => $request->get('title'),
                'subtitle'      => $request->get('subtitle'),
                'text'          => $request->get('text'),
                'button'        => $request->get('button'),
                'button_link'   => $request->get('button_link'),
            ];

            if ($this->bannerService->create($att, 'create')) {
                return redirect()->route('banner')->with('success', 'Thành công');
            }
            return redirect()->route('banner')->with('error', 'Không thành công');
        }
        $data = $this->bannerService->create([], '');
        return view('banner.create', $data);
    }
}
