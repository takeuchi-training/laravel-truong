<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index() {
        $files = File::all();

        return view('file.index', [
            'files' => $files
        ]);
    }

    public function create() {
        return view('file.create');
    }

    public function store(Request $request) {
        $path = $request->file('myFile')->store('files');

        File::create([
            'path' => $path
        ]);

        return redirect('/files');
    }

    public function show(File $file) {
        $pathToFile = Storage::path($file->path);

        return response()->file($pathToFile);
    }

    public function destroy(File $file) {
        Storage::delete($file->path);

        $file->delete();

        return redirect('/files');
    }
}
