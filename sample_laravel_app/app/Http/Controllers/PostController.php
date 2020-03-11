<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //投稿画面(入力)
    public function index() {
        return view('posts.post_form');
    }
}
