<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\User;

class TokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        if(!$token){
            return $this->resFailed();
        }

        $user = User::where('token', $token)->first();
        if(!$user){
            return $this->resFailed();
        }

        $request->merge(['auth' => $user]);
        
        return $next($request);
    }
    public function resFailed(){
        return response([
            'message' => 'Unauthorized'
        ],401);
    }
}

// Userの生成等は自分でやってほしい
//　トークンの自動生成
//注文を作ってほしい　orders
//ユーザーと注文を紐づける　orderitemを作成してほしい
