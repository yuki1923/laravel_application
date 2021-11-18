<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //trueに変更することでrulesのに書いてあるバリデーションが有効になる
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:20',
            'body' => 'required|max:140',
        ];
    }

    //バリデーションメッセージのカスタマイズ
    public function messages()
    {
        return [
            'title.required' => '入力必須です。',
            'title.max' => 'タイトルは20文字以内で入力してください。',
            'body.required' => '入力必須です。',
            'body.max' => '本文は140文字以内で入力してください。',
        ];
    }
}
