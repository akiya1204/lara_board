@extends('layouts/layout')
 
@section('content')
<div class="container">
    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">メールアドレス</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title">
            @if ($errors->has('title'))
                <p class="error-message">{{ $errors->first('title') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">お問い合わせ内容</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">入力内容確認</button>
    </form>
</div>

@endsection