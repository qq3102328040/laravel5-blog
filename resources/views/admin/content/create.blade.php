@extends('admin.layout')

@section('title')
    <title>新增文章</title>
@stop

@section('body')
    @include('admin.content.content', ['h2title' => '撰写文章', 'button' => '发布文章'])
@stop