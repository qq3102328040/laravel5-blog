@extends('admin.layout')

@section('title')
    <title>编辑标签</title>
@stop


@section('body')
    <div class="container">
        <div class="container">
            <h2>编辑标签--{{ $data->mid }}</h2>
        </div>
        <div class="row">
            @include('admin.tag.tag')
            <div class="col-md-4">
                <form action="{{ action('Admin\TagController@update', $data->mid) }}" method="post">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input name">标签名称</label>
                        <input type="text" name="name" id="input name" class="form-control" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="input textarea">标签描述</label>
                        <textarea name="description" id="input textarea" cols="30" rows="10" class="form-control">{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group">
                        @include('errors.list')
                        <span class="pull-left">
                            <button class="btn btn-danger">删除标签</button>
                        </span>
                        <span class="pull-right">
                        <button type="submit" class="btn btn-primary">修改标签</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop