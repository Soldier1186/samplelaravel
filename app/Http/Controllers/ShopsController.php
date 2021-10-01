<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\ShopRequest;

class ShopsController extends Controller
{
    //一覧
    public function index(){
        $shops = Shop::orderBy('id','asc')->get();
        return $shops;
    }
    //詳細
    public function show($id){
        $shop = Shop::with('items')->find($id);
        if(!$shop){
            return response([
                'message' => 'Not Found'
            ], 404);
        }
        return $shop;
    }
    //追加
    public function store(ShopRequest $request){
        $shops = Shop::create($request->all());
        return response([
            'id' => $shops->id
        ],201);
    }
    //編集
    public function update(ShopRequest $request, $id){
        $shop = Shop::where('shops.id' , $id)->first();
        if(!$shop){
            return response([
                'error_message' => 'Not Found'
            ], 404);
        }
        //書き換え保存
        $shop->photo = $request->photo;
        $shop->name = $request->name;
        $shop->opening_time = $request->opening_time;
        $shop->closing_time = $request->closing_time;
        $shop->price_range = $request->price_range;
        //
        $shop->save();
        return response([
            'status' => 'saccess'
        ],204);
    }
   //削除
    public function destroy($id){
        $shop = Shop::where('shops.id' , $id)->first();
        if(!$shop){
            return response([
                'message' => 'Not Found'
            ],404);
        }
            $shop->delete();
            
            return response([
                'status' => 'success'
            ], 204);
    }
    
    
}
