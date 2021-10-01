<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Request\BaseRequest;

class ItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //条件
            'shop_id' =>'required|integer',//必須だよ|数字鹿だめだよ
            'photo' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer'
        ];
    }
}
