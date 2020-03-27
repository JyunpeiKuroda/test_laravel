<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\ValiDemoRequest;
use Illuminate\Support\Facades\DB;  //sqlクエリ確認？
use Storage;    // ファイルストレージを追加
use App\Topic;  //モデルのパスを追加

class TopicsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  // 一覧画面(image_index)
  // 1 PaginateではなくsimplePaginateなのはページネーションで「戻る」「進む」の間にページ数が要らないから。
  public function index() {
    // 1
    $topics_all = Topic::orderBy('created_at', 'desc')->simplePaginate(10);
    return view('img.image_index', ['topics_all' => $topics_all]);
  }


  // 削除(image_index/delete/{topic_id})
    // 1 取得したtopic_idに対応するレコード検索して取得
    // 2 格納した$topicからimg_pathを取得。("storage/productimage/〜〜.peg)
    // 3 ファイルの物理削除の実行、ディレクトリパスを指定して画像を削除(http://recipes.laravel.jp/recipe/188)
    // 4 $topicに入っている、レコードを物理削除。
  public function delete($topic_id) {
    // 1
    $topic = Topic::find($topic_id);
    // 2
    $filename = $topic->img_path;
    // 3
    \File::delete($filename);
    // 4
    $topic->delete();
    return redirect('image_index');
  }


  // 投稿・入力(new_input)
  public function getNewInput() {
    return view('img.new_input');
  }

  // 投稿・確認(new_confirm)
  // 1 入力値の取得
  // 2 exceptで[img_path]以外を$post_dataに格納。('content'等)
  // 3 file()で引数に指定しているimg_pathを$imagefileに格納。(new_inputで選んだイメージファイルのdata)
  // 4 $temp_image_pathに、"public/temp/〜〜.jpeg"を格納
  // 5 $read_temp_pathに、str_replaceを使って$temp_image_pathの中の文字列の中の'public/'を'storage/'に変換して格納
  // 6 $post_dataから'product_name'を$product_contentに格納。
  // 7 $requestにsession()->put()でkyeに'data'を指定してセッションに保存。
  // 8 ビューの表示 && compact()でさっきsessionに保存したkyeのdataを保存。
  public function getNewConfirm(Request $request) {
    // 1
    // 2
    $post_data = $request->except('img_path');
    // 3
    $imagefile = $request->file('img_path');
    // 4
    $temp_image_path = $imagefile->store('public/temp');
    // 5
    $read_temp_path = str_replace('public/', 'storage/', $temp_image_path);
    // 6
    $product_content = $post_data['content'];
    // $data配列[key, value]
    $data = [
      'temp_image_path' => $temp_image_path,
      'read_temp_path'  => $read_temp_path,
      'product_content' => $product_content,
    ];
    // 7
    $request->session()->put('data', $data);
    // 8
    return view('img.new_confirm', compact('data') );
  }

  // 投稿・完了(new_complete)
  // 1 確認で保存したsession()からpull('data');で取り出し$inherit_dataに格納。同時にsessionのdataの削除。
  // 2 取得した$inherit_dataの中のtemp_image_path("public/temp/〜〜.jpeg")を格納
  // 3 $filenameは、$temp_image_pathの中のpathの'public/temp/'を除いて""空にして、〜〜.jpegのみ
  // 4 画像を保存する($prod_image_path)は、"public/productimage/xxx.jpeg"
  // 5 Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
  // 6 viewから画像を読み込むときのパスは、$prod_image_pathから'public/'を'storage/'に入れ替えた、storage/productimage/xxx.jpeg"
  // 7 controllerからviewへの変数の受け渡し  compact()
  public function postNewComplete(Request $request) {
    // 1
    $inherit_data = $request->session()->pull('data');
    // 2
    $temp_image_path = $inherit_data['temp_image_path'];
    $prod_content    = $inherit_data['product_content'];
    // 3
    $filename = str_replace('public/temp/', '', $temp_image_path);
    // 4
    $prod_image_path = 'public/productimage/'.$filename;
    // 5
    Storage::move($temp_image_path, $prod_image_path);
    // 6
    $read_path = str_replace('public/', 'storage/', $prod_image_path);
    // db保存用
    $topic = new Topic();
    $topic->img_path = $read_path;
    $topic->content = $prod_content;
    $topic->save();
    // 7
    return view('img.new_complete', compact('read_path'));
  }
}
