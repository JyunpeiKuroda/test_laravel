<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // ここのテーブルの名前を間違えないように！
    protected $fillable = ['body'];
}
