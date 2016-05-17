@extends('admin.layout')

@section('title')
    <title>管理文章</title>
@stop

@section('body')
    <div class="container">
        <div class="container">
            <h2>管理文章</h2>
        </div>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>分类</th>
                        <th>日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td><input type="checkbox" value="{{ $content->cid }}" name="cid"/></td>
                            <td>{{ $content->cid }}</td>
                            <td>{{ $content->title }}</td>
                            <td>{{  $content->belongsToUser->name }}</td>
                            <td>日记</td>
                            <td>{{ \Carbon\Carbon::parse($content->created_at)->format('Y-m-d H:i') }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs" onclick="">访问</button>
                                <button type="button" class="btn btn-primary btn-xs" onclick="location.href='{{ action('Admin\ContentController@edit', $content->cid) }}'">修改</button>
                                <button type="button" class="btn btn-danger btn-xs">删除</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pull-right">
            {!! $contents->render() !!}
        </div>
    </div>
@stop