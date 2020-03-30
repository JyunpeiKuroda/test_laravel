@extends('layouts.layout')
@section('title', '完了画面')
@section('content')
  <p>投稿が完了しました</p>
  <img src="{{ $read_path }}" width="300" height="200">
  <button>
    <a link href="/image_index">一覧画面に戻る</a>
  </button>
@endsection