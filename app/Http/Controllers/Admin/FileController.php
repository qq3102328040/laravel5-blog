<?php

namespace App\Http\Controllers\Admin;

use App\Services\FileManager;
use Illuminate\Http\Request;

use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    protected $manager;

    public function __construct(FileManager $manager)
    {
        $this->manager = $manager;
    }

    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);
//        return view('admin.file.index');
        return view('admin.file.index', $data);
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
