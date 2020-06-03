@extends('layouts/layout')

@section('content')
    <div id="wrapper">
        <div id="cart_list">
            <p>ショッピングカート</p>
            <p><a href="{{ route('list') }}">商品一覧へ戻る</a></p>
            <p>カート内商品数：{{ $cart_num }}個 合計金額：&yen{{ number_format($cart_price, 0) }};</p>
                @if ($cart_items->isEmpty())
                <p>カートに商品は入っていません</p>
                    @else
                    <a href="{{ route('complete') }}">注文を確定する</a>
                        @foreach ($cart_items as $item)
                            <div class="item">
                                <ul>
                                    <li class="image"><img src="{{ asset('/img/' . $item->image) }}" alt="{{$item->item_name}}"></li>
                                    <li class="name">{{$item->item_name}}</li>
                                    <li class="price">&yen;{{ number_format($item->total_price, 0) }}</li>
                                    <li class="num">{{ $item->total_num }}個</li>
                                    <li>
                                        <form action="{{ route('change_num') }}" method="post">
                                            @csrf
                                            個数変更 : 
                                            <select name="change_num">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select><br>
                                            <input type="hidden" name="crt_id" id="crt_id" value="{{ $item->crt_id }}">
                                            <input type="submit" value="変更する">
                                        </form>
                                    </li>
                                    <li><a href="{{ route('delete', ['item_id' => $item->item_id , 'customer_id' => $item->customer_id]) }}">削除</a></li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
        </div>
    </div>
@endsection