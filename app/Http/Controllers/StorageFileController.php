<?php

namespace App\Http\Controllers;

use File;
use Response;
use Illuminate\Http\Request;

class StorageFileController extends Controller
{
    public function getStorageImage($filename)
    {
        $path = storage_path('app/public/images/'.$filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file,200);
        $response->header("Content-type", $type);

        return $response;
    }
}
