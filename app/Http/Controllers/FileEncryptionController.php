<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SoareCostin\FileVault\Facades\FileVault;



class FileEncryptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $files = Storage::files('files/' . auth()->id());

        return view('EncryptionFile.encryption', compact('files'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'file' => 'required'
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $filename = Storage::putFile('files/' . auth()->id(), $request->file('file'));
            if ($filename) {
                FileVault::encrypt($filename);
            }
        }
        return redirect()->route('formUpload')->with('message', 'Upload complete');
    }

    public function download($filename)
    {
        if (!Storage::has('files/' . auth()->id() . '/' . $filename)) {
            abort(404);
        }

        return response()->streamDownload(function () use ($filename) {
            FileVault::streamDecrypt('files/' . auth()->id() . '/' . $filename);
        }, Str::replaceLast('.enc', '', $filename));
    }
}
