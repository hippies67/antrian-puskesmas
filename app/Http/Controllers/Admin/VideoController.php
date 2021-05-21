<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Alert;

class VideoController extends Controller
{
    public function video()
    {
        $data['video'] = Video::all();
        $data['check'] = Video::where('status', '=', 'Ditambahkan')->count();
        return view('admin.video.data', $data);
    }

    public function fileupload(Request $request)
    {
        $video = $request->file('file');
        $videoName = $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);

        $status = null;
        $videoUpload = new Video();
        $videoUpload->filename = $videoName;
        $videoUpload->status = $status;
        $videoUpload->save()
        ? Alert::success('Berhasil', 'Video telah berhasil di upload')
        : Alert::error('Gagal', 'Video gagal di upload');

        return response()->json(['success' => $videoName]);
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'filename' => 'required',
            'status' => 'nullable',
        ]);

        $data = [
            'filename' => $request->filename,
            'status' => $request->status
        ];

        $video->update($data)
        ? Alert::success('Berhasil', 'Status video berhasil diubah')
        : Alert::error('Gagal', 'Status video gagal diubah');

        return redirect()->back();
    }
}
