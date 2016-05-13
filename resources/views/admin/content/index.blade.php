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
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>分类</th>
                        <th>日期</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" value="13" name="cid"/></td>
                        <td>1</td>
                        <td>为何如此二笔</td>
                        <td>阿迪民</td>
                        <td>日记</td>
                        <td>2016年05月13日19:14:54</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop