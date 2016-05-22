<div class="col-md-8" id="tag-list">
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