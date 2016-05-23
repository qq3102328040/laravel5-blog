<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('admin.file.index');
    }

    public function getUpload()
    {
        return view('admin.file.upload');
    }

    public function postUpload(FileRequest $request)
    {
        $file = $request->file('file');

        if(!$file->isValid()){
            exit('文件上传出错！');
        }

        $filename = $file->getClientOriginalName();

        $savePath = $filename;

        $bytes = Storage::put(
            $savePath,
            file_get_contents($file->getRealPath())
        );

        if(!Storage::exists($savePath)){
            exit('保存文件失败！');
        }

        exit('上传文件成功');


    }
}
