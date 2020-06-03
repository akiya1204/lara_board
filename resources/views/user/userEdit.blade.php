@extends('layouts.layout')
@section('title','ユーザー情報変更')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="post" action="{{ route('user.userUpdate') }}">
        {{ csrf_field() }}

        <input type="hidden" name="user_id" value="{{ $authUser->id }}">
        @if($errors->has('user_id'))<div class="error">{{ $errors->first('user_id') }}</div>@endif

        <div class="labelTitle">Name</div>
        <div>
            <input type="text" class="userForm" name="name" placeholder="User" value="{{ $authUser->name }}">
            @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
        </div>

        <div class="labelTitle">Email</div>
            <input type="text" class="userForm" name="email" placeholder="Email" value="{{ $authUser->email }}">
            @if($errors->has('email'))<div class="error">{{ $errors->first('email') }}</div>@endif
        <div>
            
        </div>

        <div class="buttonSet">
            <input type="submit" name="send" value="変更" class="btn btn-primary btn-sm btn-done">
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">戻る</a>
        </div>
    </form>
</div>
@endsection