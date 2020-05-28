@extends('layouts/layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                コメントの編集
            </h1>

            <form action="{{ route('comments.update', ['comment' => $comment , 'post' => $post]) }}" method="post">
                @csrf
                @method('PUT')

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="body">
                            コメント内容
                        </label>

                        <textarea 
                        name="body" 
                        id="body" 
                        class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                        rows="4"
                        >{{ old('body') ?: $comment->body }}</textarea>

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
                        <a class="btn btn-danger"　href="{{ route('comment_delete', ['comment' => $comment , 'post' => $post]) }}">
                            削除
                        </a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection