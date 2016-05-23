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
                <h2>文件管理</h2>
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
                    <tr>
                        <td>2016-05-23 21:07:53.jpg</td>
                        <td>image/jpeg</td>
                        <td>2016年05月23日21:07:38</td>
                        <td>100kb</td>
                        <td>
                            <button type="button" class="btn btn-success btn-xs" onclick="">访问</button>
                            <button type="button" class="btn btn-primary btn-xs" onclick="">修改</button>
                            <button type="button" class="btn btn-danger btn-xs">删除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2016-05-23 21:07:53.jpg</td>
                        <td>image/jpeg</td>
                        <td>2016年05月23日21:07:38</td>
                        <td>100kb</td>
                        <td>
                            <button type="button" class="btn btn-success btn-xs" onclick="">访问</button>
                            <button type="button" class="btn btn-primary btn-xs" onclick="">修改</button>
                            <button type="button" class="btn btn-danger btn-xs">删除</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop