@extends('layouts/layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の編集
            </h1>

            <form action="{{ route('posts.update', ['post' => $post]) }}" method="post">
                @csrf
                @method('PUT')

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <p>{{ $post->title }}</p>
                    </div>

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea 
                        name="body" 
                        id="body" 
                        class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                        rows="4"
                        >{{ old('body') ?: $post->body }}</textarea>

                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{route('posts.show', ['post' => $post]) }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            更新
                        </button>
                        @if ($user_role === 'owner')
                        <a href="{{ route('posts_delete', ['post' => $post]) }}" class="btn btn-danger">
                            削除
                        </a>
                        @endif
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection