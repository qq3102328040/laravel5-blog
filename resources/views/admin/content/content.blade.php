<div class="container">
    <div class="container">
        <h2>{{ $h2title }}</h2>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div>
                @if(isset($content))
                    <form action="{{ action('Admin\ContentController@update', $content->cid) }}" method="post" id="form1">
                        <input type="hidden" name="_method" value="PATCH">
                        @else
                            <form action="{{ action('Admin\ContentController@store') }}" method="post" id="form1">
                                @endif
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" id="" placeholder="标题" value="{{ isset($content->title) ? $content->title : "" }}">
                                </div>
                                <div class="form-group">
                                    <textarea name="text" class="form-control" rows="25">{{ isset($content->text) ? $content->text : "" }}</textarea>
                                </div>
                                <div class="form-group">
                                    @include('errors.list')
                                    <span class="pull-right">
                        <button type="submit" class="btn btn-primary">{{ $button }}</button>
                </span>
                                </div>
                            </form>
            </div>
        </div>
        <div class="col-md-3">
            <div>
                <h4>分类</h4>
                <div class="container">
                    <ul class="list-unstyled">
                        @foreach($categorys as $category)
                            <li>
                                <input type="checkbox" name="category[]" value="{{ $category->mid }}" id="category-id-{{ $category->mid }}" form="form1">
                                <label for="category-id-{{ $category->mid }}">{{ $category->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h4>标签</h4>
                <div class="container">
                    <input type="text" name="tag" class="">
                </div>
            </div>
        </div>
    </div>
</div>