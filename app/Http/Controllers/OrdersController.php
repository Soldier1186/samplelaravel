<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
// use App\Models\Item;
// use App\Models\Orderitem;

use App\Http\Requests\OrderRequest;

class OrdersController extends Controller
{
    //一覧
    public function index(){
        $orders = Order::orderBy('id','asc')->get();
        // $orders = Order::orderBy('id','asc')->load('orderitem');
        // $orders = Order::orderBy('id' , 'asc')->with('orderitem')->first();
        // $items = Item::orderBy('id' , 'asc')->get();
        // $orders = Order::with('orderitem')->find(1);
        // $orders = Order::all();
        // $orders = Orderitem::all()->with('orderitem');
        // return $items;
        // return $orders;
        // $orders = Item::with('id')->find(0);
        return $orders;
    }
    //詳細
    public function show($id){
        $order = Order::with('orderitems')->find($id);
        // $shop = Shop::with('items')->find($id);
        if(!$order){
            return response([
                'error_message' => 'Not Found'
            ], 404);
        }
        return $order;
    }

    // 追加
    public function store(OrderRequest $requwst){
        $orders = Order::create($request->all());
        return response([
            'id' => $orders->id
        ],201);
    }
    // 編集
    public function update(OrderRequest $request){
        $order = Order::where('orders.id',$id)->first();
        if(!$order){
            return response([
                'message' => 'Not Found'
            ],404);
        }
        $order->name = $request->name;
        $order->number = $request->number;
        $order->zip_code = $request->zip_code;
        $order->address = $request->address;
        $order->save();
        return response([
            'status' => 'success'
        ],204);
    }
    // 削除
    public function destroy($id){
        $order = Order::where('order.id' , $id)->first();
        if(!$order){
            return response([
                'message' => 'Not Found'
            ],404);
        }
        $order->delete();

        return response([
        'statis' => 'success'
        ],204);

    }


}
