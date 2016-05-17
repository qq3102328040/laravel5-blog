<div class="container">
    <div class="container">
        <h2>{{ $h2title }}</h2>
    </div>
    <div class="container">
        @if(isset($content))
        <form action="{{ action('Admin\ContentController@update', $content->cid) }}" method="post">
            <input type="hidden" name="_method" value="PATCH">
        @else
        <form action="{{ action('Admin\ContentController@store') }}" method="post">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input type="text" name="title" class="form-control" id="" placeholder="标题" value="{{ isset($content->title) ? $content->title : "" }}">
            </div>
            <div class="form-group">
                <textarea name="text" class="form-control" rows="15">{{ isset($content->text) ? $content->text : "" }}</textarea>
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