@extends('admin.layout')

@section('title')
    <title>管理标签</title>
@stop


@section('body')
    <div class="container">
        <div class="container">
            <h2>管理标签</h2>
        </div>
        <div class="row">
            <div class="col-md-8" >
                <h4>
                    <span>文章数:&nbsp;&nbsp;</span>
                    <span class="label label-default">0+</span>
                    <span class="label label-primary">10+</span>
                    <span class="label label-success">20+</span>
                    <span class="label label-info">30+</span>
                    <span class="label label-warning">40+</span>
                    <span class="label label-danger">50+</span>
                </h4>
                <h3></h3>
                @foreach($tags as $tag)
                    @if($tag->count < 10)
                        <button type="button" class="btn btn-default" onclick="location.href='{{ action('Admin\TagController@edit', $tag->mid) }}'">{{ $tag->name }}</button>&nbsp;&nbsp;
                    @elseif($tag->count < 20)
                        <button type="button" class="btn btn-primary" onclick="location.href='{{ action('Admin\TagController@edit', $tag->mid) }}'">{{ $tag->name }}</button>&nbsp;&nbsp;
                    @elseif($tag->count < 30)
                        <button type="button" class="btn btn-success" onclick="location.href='{{ action('Admin\TagController@edit', $tag->mid) }}'">{{ $tag->name }}</button>&nbsp;&nbsp;
                    @elseif($tag->count < 40)
                        <button type="button" class="btn btn-info" onclick="location.href='{{ action('Admin\TagController@edit', $tag->mid) }}'">{{ $tag->name }}</button>&nbsp;&nbsp;
                    @elseif($tag->count < 50)
                        <button type="button" class="btn btn-warning" onclick="location.href='{{ action('Admin\TagController@edit', $tag->mid) }}'">{{ $tag->name }}</button>&nbsp;&nbsp;
                    @else
                        <button type="button" class="btn btn-danger" onclick="location.href='{{ action('Admin\TagController@edit', $tag->mid) }}'">{{ $tag->name }}</button>&nbsp;&nbsp;
                    @endif
                @endforeach
            </div>
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