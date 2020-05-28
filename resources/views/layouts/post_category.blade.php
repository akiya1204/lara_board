<div id="category">
    <ul class="list-inline">
        <li class="list-inline-item">
            <a href="{{ route('posts.index') }}">全て</a>
        </li>
        @foreach ($category as $value)
            <li class="list-inline-item">
                <a href="{{ route('post.category', ['id' => $value->ctg_id]) }}">{{$value->category_name}}</a>
            </li>
        @endforeach
    </ul>
</div>