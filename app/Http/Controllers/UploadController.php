<?php

namespace App\Http\Controllers;

use App\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadForm()
    {
        $gambar = Gambar::get();
		return view('upload',['gambar' => $gambar]);
    }

    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = date('YmdHis')."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
//        $store = Storage::disk('minio')->put('img', $file);

        $path = $file->storePubliclyAs('/img2', $nama_file);

        Gambar::create([
            'file' => Storage::url($path),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
    }
}
