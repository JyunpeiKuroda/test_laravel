<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    /**
     * ユーザーの全ポストの取得
     */
    public function posts()
    {
        return $this->hasMany('App\Models\student');
    }
}
