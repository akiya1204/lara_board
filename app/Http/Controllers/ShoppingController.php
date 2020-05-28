<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\category;
use App\cart;
use App\Complete;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index(Request $request) {

        if (!empty($request->id) === true) {
            $query = item::query();
            $query->where('ctg_id', $request->id);
            $itemDetail = $query->get();
            $category = category::all();
        } else {
            $itemDetail = item::all();
            $category = category::all();
        }

        return view('shopping/list',[
            'itemDetail' => $itemDetail,
            'category' => $category,
        ]);
    }

    public function search(Request $request) {

        if (!empty($request->keyword) === true) {
            $query = item::query();
            $query
                ->where('item_name', 'like', '%' .$request->keyword . '%')
                ->orWhere('detail', 'like', '%' .$request->keyword . '%');
            $itemDetail = $query->get();
            $category = category::all();
        } else {
            $itemDetail = item::all();
            $category = category::all();
        }

        return view('shopping/list',[
            'itemDetail' => $itemDetail,
            'category' => $category,
        ]);
    }

    public function detail($item_id) {
        $query = item::query();
        $query->where('item_id', $item_id);
        $itemDetail = $query->get();
        $category = category::all();

        return view('shopping/detail' , [
            'itemDetail' => $itemDetail[0],
            'category' => $category,
        ]);
    }

    public function cart(Request $request) {
        $user = Auth::user();
        if($request->has('item_id') === false){
            $query = Cart::query();
            $query->where('customer_id', $user->id);
            $query->where('carts.delete_flg', 0);
            $cart_items = $query
                        ->join('items', 'carts.item_id', '=', 'items.item_id')
                        ->select(\DB::raw("sum(carts.price) as total_price,sum(carts.num) as total_num,items.item_name,items.image,carts.customer_id,carts.item_id"))
                        ->groupBy('items.item_name')
                        ->get();
            $cart_price = collect($cart_items)->sum('total_price');
            $cart_num = collect($cart_items)->sum('total_num');
        } else {
            $carts = Cart::query();
            $id_count = $carts
                            ->select('item_id')
                            ->where('item_id',$request->item_id)
                            ->where('delete_flg',0)
                            ->count();
            if ($id_count === 0) {
                $query = item::query();
                $item_id = intval($request->item_id);
                    $query->where('item_id', $item_id);
                    $item = $query->get()->toArray();
    
                    $item[0]['customer_id'] = $user->id;
                    $item[0]['num'] = $request->count;
                    $item[0]['price'] = $item[0]['price']*$request->count;
                    Cart::create($item[0]);
            } else {
                $now_cart = $carts
                                ->select('*')
                                ->where('item_id',$request->item_id)
                                ->get();
                $update_num = $now_cart[0]['num'] + $request->count;
                $update_price = ($now_cart[0]['price'] / $now_cart[0]['num']) * $update_num;

                $carts
                    ->where('item_id', $request->item_id)
                    ->update([
                        'num' => $update_num,
                        'price' => $update_price
                    ]);
            }

            return redirect()->route('cart');
        }

        return view('shopping/cart' , [
            'cart_items' => $cart_items,
            'cart_price' => $cart_price,
            'cart_num' => $cart_num,
        ]);
    }

    public function delete(Request $request) {

            $query = cart::query();
            $query
                ->where('item_id', $request->item_id)
                ->where('customer_id', $request->customer_id)
                ->update(['delete_flg' => 1]);
        
        return redirect()->route('cart');
    }

    public function complete() {
        $user = Auth::user();
        $query = Cart::query();
        $query->where('customer_id', $user->id);
        $query->where('delete_flg', 0);
        $complete = $query->get()->toArray();
        // dd($complete);
        Complete::create($complete[0]);

        return redirect()->route('complete2');
    }

    public function complete2() {
        $user = Auth::user();
        $query = Cart::query();
        $query->where('customer_id', $user->id);
        $query->where('delete_flg', 0);
        $query->update(['delete_flg' => 1]);
        return view('shopping/complete');
    }

    public function history() {
        $user = Auth::user();
        $history_items = Complete::select(\DB::raw('completes.*,items.image'))->join('items', 'completes.item_id', '=', 'items.item_id')->where('customer_id', $user->id)->get();

        return view('shopping/history' , [
            'history_items' => $history_items,
        ]);
    }
}

