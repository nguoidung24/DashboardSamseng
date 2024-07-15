<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{

    public function index(Request $request)
    {
        $action = $request->get('action', '');
        // if ($action != 'upload_image_samseng') {
        //     return "image";
        // }

        $paths = [];
        $uploadedFile_ = $request->file('file');
        if ($uploadedFile_) {
            foreach ($uploadedFile_ as $_uploadedFile) {
                $path = public_path('uploads');
                $fileName = uniqid() . '.png';

                File::makeDirectory($path, $mode = 0777, true, true);
                $_uploadedFile->move($path, $fileName);

                array_push($paths, ['path' => 'uploads/'.$fileName]);
            }
            return response()->json($paths, 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
