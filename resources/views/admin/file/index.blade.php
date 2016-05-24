@extends('admin.layout')

@section('title')
    <title>文件管理</title>
@stop

@section('style')
    <style>
        #right-button {
            padding-top: 15px;
        }
    </style>
@stop

@section('body')
    <div class="container">
        <div>
            <span class="pull-left">
                <h2>文件管理
                    @foreach($breadcrumbs as $path => $name)
                        <a href="/admin/file/index?folder={{ $path }}">{{ $name }}/</a>
                    @endforeach
                </h2>
            </span>
            <span class="pull-right" id="right-button">
                <a class="btn btn-success">新建文件夹</a>
                <a href="{{ action('Admin\FileController@getUpload') }}" class="btn btn-primary">上传文件</a>
            </span>
        </div>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>名称</th>
                        <th>类型</th>
                        <th>日期</th>
                        <th>大小</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subfolders as $path => $name)
                    <tr>
                        <td><a href="/admin/file/index?folder={{ $path }}">{{ $name }}</a></td>
                        <td>文件夹</td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-success btn-xs" onclick="">访问</button>
                            <button type="button" class="btn btn-primary btn-xs" onclick="">修改</button>
                            <button type="button" class="btn btn-danger btn-xs">删除</button>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($files as $file)
                    <tr>
                        <td>{{ $file['name'] }}</td>
                        <td>{{ $file['mimeType'] }}</td>
                        <td>{{ $file['modified'] }}</td>
                        <td>{{ $file['size'] }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-xs" onclick="">访问</button>
                            <button type="button" class="btn btn-primary btn-xs" onclick="">修改</button>
                            <button type="button" class="btn btn-danger btn-xs">删除</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop