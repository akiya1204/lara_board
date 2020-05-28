@extends('layouts/layout')

@section('content')

<div class="container mt-4" id="app">
    <div class="mb-4 d-flex row d-flex justify-content-around">
        <div>
            <label for="" class="mr-3">カテゴリー</label>
            @include('layouts/category_menu')
        </div>
        
        <form class="form-inline" method="post" action="{{ route('search') }}">
            @csrf
            <div class="form mx-sm-3 mb-2">
                <input type="text" class="form-control" placeholder="商品検索" name="keyword" value="">
            </div>
            <button type="submit" class="btn btn-primary mb-2">検索</button>
        </form>
    </div>
    
    <div class="item row text-center">  
        @foreach ($itemDetail as $item)
            <ul class="col-12 col-md-6 col-lg-4">
                <li class="name"><a href="{{ route('detail', ['id' => $item->item_id]) }}">{{$item->item_name}}</a></li>
                <li class="price">&yen;{{ number_format($item->price, 0) }}</li>
                <li class="image">
                    <a href="{{ route('detail', ['id' => $item->item_id]) }}">
                    <img src="{{ asset('/img/' . $item->image) }}" alt="{{$item->item_name}}" class="img-fluid col-6">
                    </a>
                </li>
                <li class="detail"><a href="{{ route('detail', ['id' => $item->item_id]) }}">詳細</a></li>
            </ul>
        @endforeach
    </div>
    
</div>


@endsection