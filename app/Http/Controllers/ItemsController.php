<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Http\Requests\ItemRequest;


class ItemsController extends Controller
{
    //一覧
    public function index(){
        $items = Item::orderBy('id','asc')->get();
        return $items;
    }

    //詳細
    public function show($id){
        $item = Item::all()->find($id);

        if(!$item){
            return response([
                'error_message' => 'Not Found'
            ], 404);
        }
        return $item;
    }

    //商品追加 応用が利くので覚えといて
    public function store(ItemRequest $request){
        $items = Item::create($request->all());
        return response([
            'id' => $items->id
        ],201);
    }

    //商品の編集　応用が利くので覚えといて
    public function update(ItemRequest $request, $id){
        $item = Item::where('items.id', $id)->first();
        if(!$item){
            return response([
                'message' => 'Not Found'
            ], 404);
        }

        //書き換え
        $item->photo = $request->photo;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        //保存
        $item->save();
        //あったら
        return response([
            'status' => 'success'
        ],204);
    }

    //削除　応用が利きます。
    public function destroy($id){
        //IDの検索
        $item = Item::where('items.id', $id)->first();
        //なければ
        if(!$item){
            return response([
                'message' => 'Not Found'
            ], 404);
        }
        //あったら
        $item->delete();

        return response([
            'status' => 'success'
        ], 204);
    }


}
