@extends('layouts.layout')

@section('content')
    <div class="container mt-4" id="app">
        <div class="mb-4 d-flex">
            <label for="" class="mr-3">カテゴリー</label>
            @include('layouts/post_category')
        </div>
        <div class="mb-4 row justify-content-around">
            <form class="form-inline mb-4" method="post" action="{{ route('post.search') }}">
                @csrf
                <div class="form mx-sm-3 mb-2">
                <input type="text" name="keyword" class="form-control" placeholder="ブログ検索">
                </div>
                <button type="submit" class="btn btn-primary mb-2">検索</button>
            </form>
            <div class="mb-4 text-center">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    投稿を新規作成する
                </a>
            </div>
        </div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        {{ $post->title }}
                    </div>
                    <div>
                        {{ $post->user->name }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-text">
                            {!! nl2br(e(Str::limit($post->body, 200))) !!}
                        </p>
                        <p>
                            カテゴリー : {{ $post->category_name }}
                        </p>
                    </div>

                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
                    </a>
                </div>
                <div class="list-group list-group-flush">
                    @foreach ($post->comments->where('delete_flg',0) as $comment)
                    <ul>
                        <li>
                            {{ $comment->user->name }}
                        </li>
                        <li class="">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </li>
                        <li class="list-group-item">
                            {!! nl2br(e($comment->body)) !!}
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
    </div>
@endsection