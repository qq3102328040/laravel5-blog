<div class="col-md-8">
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>id</th>
            <th>名称</th>
            <th>文章数目</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorys as $category)
        <tr>
            <td><input type="checkbox" value="{{ $category->mid }}" name="cid"/></td>
            <td>{{ $category->mid }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->count }}</td>
            <td>
                <button type="button" class="btn btn-success btn-xs" onclick="">访问</button>
                <button type="button" class="btn btn-primary btn-xs" onclick="location.href='{{ action('Admin\CategoryController@edit', $category->mid) }}'">修改</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">删除</button>
                @include('admin.extra.delete_model', ['targetUrl' => action('Admin\CategoryController@destroy', $category->mid)])
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {!! $categorys->render() !!}
    </div>
</div>