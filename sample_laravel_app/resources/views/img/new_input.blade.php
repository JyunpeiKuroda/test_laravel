@extends('layouts.layout')
@section('title', '入力')
@section('content')
  <form enctype="multipart/form-data" action="new_confirm" method="post" id="form">
    @csrf
    <label>画像:</label>
    <input type="file" name="img_path" value="{{ old('img_path') }}"/><br /><br />

    <label>投稿Text:</label><br />
    <input type="text" name="content" size="50" value="{{ old('content') }}"/><br /><br />

    <input type="submit" name="confirm" id="button" value="確認" />
  </form>
@endsection