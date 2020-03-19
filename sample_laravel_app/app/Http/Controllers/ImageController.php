<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;    //
use App\Upimage;  //モデルのパスを追加

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 投稿一覧画面
    public function index() {
        $upimages = Upimage::all();
        return view('img.image_index');
    }

    // form(入力)
    public function getNewInput() {
        return view('img.new_input');
    }

    // form(確認)
    public function postNewConfirm(Request $request) {
        //入力値の取得
        $post_data = $request->except('imagefile');
        // exceptで[imagefile]以外("product_name"等)を$post_dataに格納。
        $imagefile = $request->file('imagefile');
        // file()で引数に指定しているimagefileを$imagefileに格納。

        $temp_image_path = $imagefile->store('public/temp');
        // $temp_image_pathに、"public/temp/〜〜.jpeg"を格納
        $read_temp_path = str_replace('public/', 'storage/', $temp_image_path);
        // $read_temp_pathに、str_replaceを使って$temp_image_pathの中の文字列の中の'public/'を'storage/'に変換して格納
        $product_content = $post_data['content'];
        // $post_dataから'product_name'を$product_nameに格納。

        // $read_temp_path->save();
        // $product_name->save();

        // // db保存用
        // $upimage = new Upimage();
        // $upimage->content = $product_name;
        // $upimage->imagefile = $read_temp_path;
        // $upimage->save();


        // $data配列[key, value]
        $data = [
            'temp_image_path' => $temp_image_path,
            'read_temp_path' => $read_temp_path,
            'product_content' => $product_content,
        ];

        // DB::insert('insert into users (id, ,read_temp_path,  name) values (?, ?)'
        // , [1, 'Dayle'])

        // $requestにsession()->put()でkyeに'data'を指定してセッションに保存。
        $request->session()->put('data', $data);
        //ビューの表示
        //compact()でさっきsessionに保存したkyeのdataを保存。

        // $this->validemo($request, Upimage::$rules);
        $upimage = new Upimage;
        $form = $request->all();
        unset($form['_token']);

        // dd($upimage);

        // $upimage->fill($form)->save();
        // return redirect('/person');

        return view('img.new_confirm', compact('data') );
    }

    // form(完了)
    public function postNewComplete(Request $request) {
        //保存したセッションから取得し$dataに格納
        $data = $request->session()->get('data');

        // 取得した$dataの中の'temp_image_path'("public/temp/〜〜.jpeg")を格納
        $temp_image_path = $data['temp_image_path'];
        $prod_content = $data['product_content'];

        // $filenameは、$temp_image_pathの中のpathの'public/temp/'を除いて""空にして、〜〜.jpegのみ
        $filename = str_replace('public/temp/', '', $temp_image_path);
        //画像を保存する($prod_image_path)は、"public/productimage/xxx.jpeg"
        $prod_image_path = 'public/productimage/'.$filename;

        // セッションをforget()で引数の'data'を消す
        $request->session()->forget('data');

        //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
        Storage::move($temp_image_path, $prod_image_path);

        //viewから画像を読み込むときのパスは、$prod_image_pathから'public/'を'storage/'に入れ替えた、storage/productimage/xxx.jpeg"
        $read_path = str_replace('public/', 'storage/', $prod_image_path);

        return view('img.new_complete', compact('read_path'));
    }
}
