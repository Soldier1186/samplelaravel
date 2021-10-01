<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //一覧
    public function index(){
        $users = User::orderBy('id','asc')->get();
        return $users;
    }
    //詳細
    public function show($id){
        $user = User::all()->find($id);
        // $user = User::with('orderitems')->find($id);

        if(!$user){
            return response([
                'error_message' => 'Not Found'
            ], 404);
        }
        return $user;
    }
    public function user(UserRequest $request){
        $users = User::create($request->all());
        return response([
            'id' => $users->id
        ],201);
    }
}
