@extends('layouts/layout')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        <input
            name="email"
            value="{{ $inputs['email'] }}"
            type="hidden">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">メールアドレス</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $inputs['email'] }}">
            </div>
        </div>

        <input
            name="title"
            value="{{ $inputs['title'] }}"
            type="hidden">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">タイトル</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $inputs['title'] }}">
            </div>
        </div>
        
        <input
            name="body"
            value="{{ $inputs['body'] }}"
            type="hidden">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">お問い合わせ内容</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{!! nl2br(e($inputs['body'])) !!}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="back">
            入力内容修正
        </button>
        <button type="submit" class="btn btn-primary" name="action" value="submit">
            送信する
        </button>
    </form>
</div>
@endsection