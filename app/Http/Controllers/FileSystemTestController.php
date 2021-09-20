<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileSystemTestController extends Controller
{
    public function createFile()
    {
        return view('file');
    }

    public function storeFile(Request $request)
    {
        $filePath = Storage::disk('public')->putFile('', $request->file('testFile'));

        // return Storage::disk('public')->download($filePath);

        // Storage::disk('public')->delete($filePath);

        return back()->with('filePath', $filePath);
    }
}
