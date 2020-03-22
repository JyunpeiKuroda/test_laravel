<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValiDemoController extends Controller {
    // 表示画面を作成
    public function getIndex() {
        return view('validation.index');
    }

    public function confirm(\App\Http\Requests\ValiDemoRequest $request) {
        // バリデーションのルールを作成
        $validateRules = [
            'username'=>'required',
            'mail'=>'required|email',
            'age'=>'required|numeric',
            'opinion'=>'required|max:500'
        ];

        // バリデーションのエラーメッセージを作成
        $validateMessages = [
            "required" => "必須項目です。",
            "email" => "メールアドレスの形式で入力してください。",
            "numeric" => "数値で入力してください。",
            "opinion.max" => "500文字以内で入力してください。"
        ];

        //バリデーションをインスタンス化
        $this->validate($request, $validateRules, $validateMessages);
        $data = $request->all();
        return view('validation.confirm')->with($data);
    }
}
