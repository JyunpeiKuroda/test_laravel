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
    protected $primaryKey = 'topic_id';
    // name, email, passwordカラムにデータの挿入を許可する
    protected $fillable = ['topic_id', 'user_id', 'img_path', 'content'];
}
