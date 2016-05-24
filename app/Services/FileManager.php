<?php

namespace App\Services;

use Dflydev\ApacheMimeTypes\PhpRepository;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class FileManager
{
    protected $disk;
    protected $mimeDetect;

    public function __construct(PhpRepository $mimeDetect)
    {
        $this->disk = Storage::disk('local');
        $this->mimeDetect = $mimeDetect;
    }

    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);

        //实现了将路径拆开, 取前 n-1 个
        $breadcrumbs = $this->breadcrumbs($folder);
//        dd($breadcrumbs);
        $slice = array_slice($breadcrumbs, -1);
//        dd($slice);
        $folderName = current($slice);//取出了当前文件夹名称
//        dd($folderName);
        if(!$slice == ['/' => 'root']){
            $breadcrumbs = array_slice($breadcrumbs, 0, -1);//移除最后一个
        }
//        dd($breadcrumbs);

        //获取目录列表, 拆开, 放数组里
        $subfolders = [];
        foreach (($this->disk->directories($folder)) as $subfolder) {
            $subfolders["/$subfolder"] = basename($subfolder);
        }

        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            $files[] = $this->fileDetails($path);
        }

//        dd(
//            compact(
//            'folder',
//            'folderName',
//            'breadcrumbs',
//            'subfolders',
//            'files'
//        ));
        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );
    }

    /**
     * Sanitize the folder name
     */
    protected function cleanFolder($folder)
    {
        return '/' . trim(str_replace('..', '', $folder), '/');
    }

    /**
     * 返回当前目录路径
     */
    protected function breadcrumbs($folder)
    {
        $folder = trim($folder, '/');
        $crumbs = ['/' => 'root'];

        if (empty($folder)) {
            return $crumbs;
        }

        $folders = explode('/', $folder);
        $build = '';
        foreach ($folders as $folder) {
            $build .= '/'.$folder;
            $crumbs[$build] = $folder;
        }

        return $crumbs;
    }

    /**
     * 返回文件详细信息数组
     */
    protected function fileDetails($path)
    {
        $path = '/' . ltrim($path, '/');

        return [
            'name' => basename($path),
            'fullPath' => $path,
            'webPath' => $this->fileWebpath($path),
            'mimeType' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),
        ];
    }

    /**
     * 返回文件完整的web路径
     */
    public function fileWebpath($path)
    {
        $path = rtrim(storage_path('/'), '/') . '/' .ltrim($path, '/');
        return url($path);
    }

    /**
     * 返回文件MIME类型
     */
    public function fileMimeType($path)
    {
        return $this->mimeDetect->findType(
            pathinfo($path, PATHINFO_EXTENSION)
        );
    }

    /**
     * 返回文件大小
     */
    public function fileSize($path)
    {
        return $this->disk->size($path);
    }

    /**
     * 返回最后修改时间
     */
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }

}
