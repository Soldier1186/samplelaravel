<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    //書き込み
    protected $fillable = ['shop_id' , 'photo' , 'name' , 'description' , 'price'];
    
    //表示しない
    protected $hidden = ['shop_id' , 'created_at' , 'updated_at' , 'pivot'];
}
