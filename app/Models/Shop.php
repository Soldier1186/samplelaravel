<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    // //書き込みを行う
    protected $fillable = ['photo' , 'name' , 'opening_time', 'closing_time' , 'price_range'];

    //結果に出さない
    protected $hidden = ['created_at' , 'updated_at'];

    //商品データ連結　これはデータを　表示したいときのための物
    public function items(){
        return $this->belongsToMany('App\Models\Item');
    }
    
}
