@extends('layouts.layout')
@section('title','ユーザー情報')
@section('content')
<div class="container">
  <table class="table table-striped table-hover">
  <thead>
  <tr>
    <th>名前</th>
    <th>メールアドレス</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $authUser->name }}</td>
      <td>{{ $authUser->email }}</td>
      <td>
      <a href="{{ route('user.userEdit') }}" class="btn btn-primary btn-sm">編集</a>
      </td>
    </tr>
  </tbody>
  </table>
  <a href="{{ route('home') }}" class="btn btn-primary">
    戻る
  </a>
</div>  
@endsection