<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'topics';

    // name, email, passwordカラムにデータの挿入を許可する
    protected $fillable = ['user_id', 'img_path', 'content'];
}
