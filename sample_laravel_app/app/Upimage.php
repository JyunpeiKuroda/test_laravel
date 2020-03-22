<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upimage extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'upimages';

    // name, email, passwordカラムにデータの挿入を許可する
    protected $fillable = ['user_id', 'img_path', 'content'];
}
