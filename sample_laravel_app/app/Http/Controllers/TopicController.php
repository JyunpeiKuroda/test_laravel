<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\ValiDemoRequest;
use Storage;    // ファイルストレージを追加
use App\Topic;  //モデルのパスを追加

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 投稿一覧画面
    public function index() {
        $topic_all = Topic::orderBy('created_at', 'desc')->get();
        return view('img.image_index', ['topic_all' => $topic_all]);
    }

    // form(入力)
    public function getNewInput() {
        return view('img.new_input');
    }

    // form(確認)
    public function getNewConfirm(Request $request) {
        //入力値の取得
        $post_data = $request->except('img_path');
        // exceptで[img_path]以外を$post_dataに格納。('content'等)
        $imagefile = $request->file('img_path');
        // file()で引数に指定しているimg_pathを$imagefileに格納。(new_inputで選んだイメージファイルのdata)

        $temp_image_path = $imagefile->store('public/temp');
        // $temp_image_pathに、"public/temp/〜〜.jpeg"を格納
        $read_temp_path = str_replace('public/', 'storage/', $temp_image_path);
        // $read_temp_pathに、str_replaceを使って$temp_image_pathの中の文字列の中の'public/'を'storage/'に変換して格納
        $product_content = $post_data['content'];
        // $post_dataから'product_name'を$product_nameに格納。

        // $data配列[key, value]
        $data = [
            'temp_image_path' => $temp_image_path,
            'read_temp_path' => $read_temp_path,
            'product_content' => $product_content,
        ];

        // $requestにsession()->put()でkyeに'data'を指定してセッションに保存。
        $request->session()->put('data', $data);

        //ビューの表示 && compact()でさっきsessionに保存したkyeのdataを保存。
        return view('img.new_confirm', compact('data') );
    }

    // form(完了)
    public function postNewComplete(Request $request) {
        //確認で保存したsession()からpull('data');で取り出し$inherit_dataに格納。同時にsessionのdataの削除。
        $inherit_data = $request->session()->pull('data');

        // 取得した$inherit_dataの中のtemp_image_path("public/temp/〜〜.jpeg")を格納
        $temp_image_path = $inherit_data['temp_image_path'];
        $prod_content = $inherit_data['product_content'];

        // $filenameは、$temp_image_pathの中のpathの'public/temp/'を除いて""空にして、〜〜.jpegのみ
        $filename = str_replace('public/temp/', '', $temp_image_path);
        //画像を保存する($prod_image_path)は、"public/productimage/xxx.jpeg"
        $prod_image_path = 'public/productimage/'.$filename;

        //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
        Storage::move($temp_image_path, $prod_image_path);

        //viewから画像を読み込むときのパスは、$prod_image_pathから'public/'を'storage/'に入れ替えた、storage/productimage/xxx.jpeg"
        $read_path = str_replace('public/', 'storage/', $prod_image_path);

        // db保存用
        $topic = new Topic();
        $topic->img_path = $read_path;
        $topic->content = $prod_content;
        $topic->save();

        //ビューの表示
        return view('img.new_complete', compact('read_path'));
    }
}
