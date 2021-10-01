<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//店舗API Shop
use App\Http\Controllers\ShopsController;
//一覧表示
Route::get('shops',[ShopsController::class, 'index']);
//店舗詳細
Route::get('shops/{id}',[ShopsController::class, 'show']);
//追加
Route::post('shops',[ShopsController::class, 'store']);
//編集
Route::put('shops/{id}',[ShopsController::class, 'update']);
//削除
Route::delete('shops/{id}' , [ShopsController::class, 'destroy']);

/*
*/


//店舗API Item
use App\Http\Controllers\ItemsController;
//一覧表示
Route::get('items',[ItemsController::class, 'index']);
//店舗詳細
Route::get('items/{id}',[ItemsController::class, 'show']);
//商品の編集
Route::put('items/{id}',[ItemsController::class,'update']);
//商品の削除
Route::delete('items/{id}', [ItemsController::class, 'destroy']);


//店舗API Order
use App\Http\Controllers\OrdersController;
//一覧表示
Route::get('orders' , [OrdersController::class, 'index']);
//店舗詳細
Route::get('orders/{id}' , [OrdersController::class,'show']);
// Route::get('items/{id}' , [OrdersController::class,'show']);
//追加
Route::post('orders/{id}',[OrdersController::class, 'store']);
//編集
Route::put('orderspo/{id}',[OrdersController::class, 'update']);
//削除
Route::delete('orders/{id}' , [OrdersController::class, 'destroy']);

//店舗API　User
use App\Http\Controllers\UsersController;
//一覧表示
Route::get('users', [UsersController::class, 'index']);
//ユーザー詳細
Route::get('users/{id}' , [UsersController::class,'show']);
//トークン
Route::post('/tokens/vreate', function ( Request $request){
    $token = $request->user()->createToken($request->token_name);

    return['token' => $token->plainTextToken];
});


// //商品の登録
// Route::post('items', [ItemsController::class, 'store']);

// 一覧はindex 詳細はshow 商品はstore

//認証
Route::group(['middleware' => 'token_auth'], function(){
    //商品の登録
    Route::post('items', [ItemsController::class, 'store']);
});
