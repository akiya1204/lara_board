@extends('layouts/layout')

@section('content')
    <div id="wrapper">
        <div id="cart_list">
            <p>購入履歴</p>
            <p><a href="{{ route('list') }}">商品一覧へ戻る</a></p>
                @if ($history_items->isEmpty())
                <p>まだ何も購入していません。</p>
                @else
                    @foreach ($history_items as $item)
                        <div class="item">
                            <ul>
                                <li class="image"><img src="{{ asset('/img/' . $item->image) }}" alt="{{$item->item_name}}"></li>
                                <li class="name">{{$item->item_name}}</li>
                                <li class="price">&yen;{{ number_format($item->price, 0) }}</li>
                                <li class="num">{{ $item->num }}個</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
        </div>
    </div>
@endsection