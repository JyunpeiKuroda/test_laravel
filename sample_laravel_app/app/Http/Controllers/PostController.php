<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.post_form');
    }

    public function create()
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
