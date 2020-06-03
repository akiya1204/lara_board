@extends('layouts/layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="show_flex">
                <h1 class="h5 mb-4">
                    {{ $post->title }}
                </h1>
                @if($post->user_id === $user_id or $user_role === 'owner')
                <div class="mb-4 text-right">
                    <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
                        編集する
                    </a>
                </div>
                @endif
            </div>
            <p>
                {!! nl2br(e($post->body)) !!}
            </p>
            @if (!empty($post->image))
                <img src="{{ asset('storage/image/'.$post->image) }}" class="img-fluid img-thumbnail col-6" alt="">
            @endif

            <form class="mb-4 mt-4" action="{{ route('comments.store') }}" method="post">
                @csrf

                <input 
                    type="hidden" 
                    name="post_id"
                    value="{{ $post->id }}"
                >

                <div class="form-group">
                    <label for="body">
                        コメント内容
                    </label>

                    <textarea 
                        class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }} "
                        name="body" 
                        id="body" 
                        cols="30" 
                        rows="10"
                    >{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <a href="{{ route('top') }}"　class="btn btn-primary">
                        戻る
                    </a>
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                </div>
            </form>
    
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
    
                @forelse ($post->comments->where('delete_flg',0) as $comment)
                    <div>
                        <p>
                            {{ $comment->user->name }}
                        </p>
                        <p>
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                        <p class="">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </p>
                        @if($comment->user_id === $user_id or $user_role === 'owner')
                        <p>
                            <a class="btn btn-primary" href="{{ route('comments.edit', ['comment' => $comment, 'post' => $post]) }}">
                                編集する
                            </a>
                        </p>
                        @endif
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection