@extends('admin.layout')

@section('title')
    <title>管理标签</title>
@stop

@section('style')
    <style>
        #tag-list {
            line-height: 40px;
        }
    </style>
@stop

@section('body')
    <div class="container">
        <div class="container">
            <h2>管理标签</h2>
        </div>
        <div class="row">
            @include('admin.tag.tag')
            <div class="col-md-4">
                <form action="{{ action('Admin\TagController@store') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input name">标签名称</label>
                        <input type="text" name="name" id="input name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="input textarea">标签描述</label>
                        <textarea name="description" id="input textarea" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        @include('errors.list')
                        <span class="pull-right">
                        <button type="submit" class="btn btn-primary">创建标签</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop