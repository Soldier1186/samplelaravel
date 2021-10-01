<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderItemsController extends Controller
{
    //一覧
    public function index(){
        $orderitems = Order::orderBy('id','asc')->get();
        $items = Item::orderBy('id','asc')->get();
        return $orderitems;
    }
    //詳細
    public function show($id){
        $orderitem = Order::all()->find($id);

        if(!$orderitems){
            return response([
                'error_message' => 'Not Found'
            ], 404);
        }
        return $orderitems;
    }




    
}
