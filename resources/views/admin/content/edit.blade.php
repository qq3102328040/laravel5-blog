@extends('admin.layout')

@section('title')
    <title>编辑文章</title>
@stop

@section('body')
    @include('admin.content.content', ['h2title' => '修改文章', 'button' => '发布修改', ['content' => $content]])
@stop