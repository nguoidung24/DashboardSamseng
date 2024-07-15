<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(
        ContactService $contactService,
    ) {
        $this->contactService = $contactService;
    }
    public function index(Request $request)
    {

        $response = $this->contactService->list();
        return view('contact.list', $response);
    }
}
