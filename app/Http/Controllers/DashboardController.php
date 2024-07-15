<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(
        DashboardService $dashboardService,
    ) {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $action = $request->get('action');
        if ($action == 'getDashboardData') {
            return response()->json($this->dashboardService->getDashboardData());
        }
        if ($action == 'getOrderCounter') {
            return response()->json($this->dashboardService->getOrderCounter());
        }
        return null;
    }
    public function dashboard(Request $request)
    {
        $data = $this->dashboardService->getDashboardData();
        return view('home',$data);
    }
}
