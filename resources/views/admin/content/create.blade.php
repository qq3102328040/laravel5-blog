@extends('admin.layout')

@section('title')
    <title>新增文章</title>
@stop

@section('body')
    <div class="container">
        <div class="container">
            <h2>撰写文章</h2>
        </div>
        <div class="container">
            <form action="{{ action('Admin\ContentController@store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" id="" placeholder="标题">
                </div>
                <div class="form-group">
                    <textarea name="text" class="form-control" rows="15"></textarea>
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">发布文章</button>
                </div>
            </form>
        </div>
    </div>
@stop