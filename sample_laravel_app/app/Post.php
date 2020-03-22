<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 初期設定を定義する
    protected $table = 'posts';
    protected $guarded = array('id');

    // 以下独自でいろいろ定義可能
    // public function getData()
    // {
    //     return $this->id. ": this is :" . $this->message;
    // }

    // belongsTo結合(主テーブル <- 従テーブル)
    public function user() {
        return $this->belongsTo('App\User');
    }
}