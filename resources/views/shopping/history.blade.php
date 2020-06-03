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
                    {{-- {{ dd($item) }} --}}
                        <div class="item">
                            <ul>
                                <li class="image"><a href="{{ route('detail', ['id' => $item->item_id]) }}"><img src="{{ asset('/img/' . $item->image) }}" alt="{{$item->item_name}}"></a></li>
                                <li class="name">{{$item->item_name}}</li>
                                <li class="price">&yen;{{ number_format($item->price, 0) }}</li>
                                <li class="num">{{ $item->num }}個</li>
                                <li class="day">購入日 : {{ $item->created_at }}</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
        </div>
    </div>
@endsection