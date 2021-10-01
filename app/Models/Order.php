<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    //
    protected $hidden = [ 'created_at' , 'updated_at'];

    // データの連結
    public function orderitems(){
        return $this->hasMany('App\Models\Orderitem');
    }
    //できればログイン状態であればその状態の情報は保持していてほしい
}

//1  shop  追加　編集　削除を　実装　OK
//2　ordersの注文を作成  実行中 多分　OK
//3  ログイン状態の情報を保持（Token）

// PWをbase64decodeで変換してTokenに突っ込む