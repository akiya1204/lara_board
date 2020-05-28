@extends('layouts/layout')

@section('content')
    <div id="" class="container">
        @include('layouts/category_menu')
        <form action="{{ route('cart') }}">
            
            {{ csrf_field() }}

            <div id="item_detail" class="d-flex justify-content-between">
                <div class="detail mr-5 col-6">
                    <dl>
                    <dt>商品名</dt><dd>{{ $itemDetail['item_name'] }}</dd>
                    <dt>詳細</dt><dd>{{ $itemDetail['detail'] }}</dd>
                    <dt>価格</dt><dd>&yen;{{ number_format($itemDetail['price'], 0) }}</dd>
                    <dt>個数</dt>
                    <dd>
                    <select name="count">
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
                    </select>
                    </dd>
                    <input type="hidden" name="item_id" id="item_id" value="{{ $itemDetail['item_id'] }}">
                    </dl>
                </div>
                <div class="image col-6">
                    <img src="{{ asset('/img/' . $itemDetail['image']) }}" alt="{{ $itemDetail['item_name'] }}" class="img-fluid">
                </div>
            </div>
            <input type="submit" value="商品を入れる">
            <input type="submit" name="back" value="一覧へ戻る" onclick="history.back(); return false;">
        </form>
    </div>
@endsection