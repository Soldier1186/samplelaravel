<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    //書き込み
    // protected $fillable = ['id' , 'order_id' , 'item_id' , 'quantity'];
    //非表示
    protected $hidden = ['created_at' , 'updated_at'];

    // データの連結
    public function orders(){
        return $this->belongsTo('App\Models\Order');
    }
    //できればログイン状態であればその状態の情報は保持していてほしい
}