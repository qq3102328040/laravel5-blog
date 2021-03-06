@extends('admin.layout')

@section('title')
    <title>管理分类</title>
@stop

@section('body')

<div class="container">
    <div class="container">
        <h2>管理分类</h2>

    </div>
    <div class="row">
        @include('admin.category.category')
        <div class="col-md-4">
            <form action="{{ action('Admin\CategoryController@store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="input name">分类名称</label>
                    <input type="text" name="name" id="input name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="input textarea">分类描述</label>
                    <textarea name="description" id="input textarea" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    @include('errors.list')
                    <span class="pull-right">
                        <button type="submit" class="btn btn-primary">创建分类</button>
                </span>
                </div>
            </form>
        </div>
    </div>
</div>

@stop