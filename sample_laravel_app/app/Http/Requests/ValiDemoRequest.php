<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValiDemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // authorize()は権限に関する判定を行うメソッド(使わない時はtrue)
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules() {
        // バリデーションのルール
        return [
            'username'=>'required',
            'mail'=>'required|email',
            'age'=>'required|numeric',
            'opinion'=>'required|max:500'
        ];
    }

    public function messages() {
        // デフォルトで表示されるエラーメッセージをカスタマイズ
        return [
            "required" => "必須項目です。",
            "email" => "メールアドレスの形式で入力してください。",
            "numeric" => "数値で入力してください。",
            "opinion.max" => "500文字以内で入力してください。"
        ];
    }
}
