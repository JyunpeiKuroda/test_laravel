@extends('layouts.layout')
@section('title', '入力')
@section('content')
<html>
  <body>
    <div class="form_box">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <script src="js/style.js" type="text/javascript"></script>
      <form enctype="multipart/form-data" action="new_confirm" method="post" id="form">
        @csrf
        <h1>投稿画面です</h1><br>
        <label class="input-btn">
          <span class="btn btn-primary">
            写真を選択<input type="file" name="img_path" onChange="imgPreView(event)" style="display:none">
          </span>
        </label>
        <div id="preview"></div><br>
        <textarea name="content" rows="7" cols="40" maxlength="200" ></textarea>
        <br>
        <div class="form_item"><input type="submit" name="confirm" id="button" value="確認" class="btn btn-primary"></div>
      <form>
    </div>
  </body>
</html>
@endsection