<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index()
    {
        return '<a href="upload">upload</a>';
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

        $path = storage_path('app');
        if(!file_exists($path))
            mkdir($path, 0755, true);

        $filename = $file->getClientOriginalName();

        if(!$file->move($path,$filename)){
            exit('保存文件失败！');
        }
        exit('文件上传成功！');
    }
}
