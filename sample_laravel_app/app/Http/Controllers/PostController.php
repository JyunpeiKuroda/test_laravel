<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// 追加これがないとエラーになります
use Illuminate\Support\Facades\Auth;
use Validator;

class PostController extends Controller
{
    public function index() {
        $authUser = Auth::user();
        - $items = Post::with('user')->get();
        + $items = Post::with('user')->orderBy('id','desc')->paginate(5); // 1ページに5件表示

        $params = [
            'authUser' => $authUser,
            'items' => $items,
        ];
        return view('post.index', $params);
    }

    public function store(Request $request) {
        $post = new Post;
        $form = $request->all();

        // 最低限なバリデーション処理です。ここでは特に説明はしません。
        $rules = [
            'user_id' => 'integer|required', // 2項目以上条件がある場合は「 | 」を挟む
            'title' => 'required',
            'message' => 'required',
        ];
        $message = [
            'user_id.integer' => 'System Error',
            'user_id.required' => 'System Error',
            'title.required'=> 'タイトルが入力されていません',
            'message.required'=> 'メッセージが入力されていません'
        ];
        $validator = Validator::make($form, $rules, $message);

        if($validator->fails()){
            return redirect('/post')
                ->withErrors($validator)
                ->withInput();
        }else{
            unset($form['_token']);
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->message = $request->message;
            $post->save();
            return redirect('/post');
        }
    }

    public function show($id) {
        $authUser = Auth::user(); // 認証ユーザー取得
        $item = Post::find($id);
        $params = [
            'authUser' => $authUser,
            'item' => $item,
        ];
        return view('post.show', $params);
    }

    // 描画はshowでしているので不要
    // public function edit($id)
    // {
    // }

    // public function update(Request $request, $id)
    // {
        // UPDATE処理をビュー含めて下記に追加しました。
    // }

    public function destroy($id) {
        $items = Post::find($id)->delete();
        return redirect('/post');
    }
}
