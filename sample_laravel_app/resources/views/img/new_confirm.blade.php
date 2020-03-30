@extends('layouts.layout')
@section('title', '確認')
@section('content')
<html>
  <body>
    <div class="form_box">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <script src="js/style.js" type="text/javascript"></script>
      <form  action="new_complete" method="post">
        @csrf
        <h1>確認画面です</h1><br>
        <tr>
          <td>画像</td>
          <td><img src="{{ $data['read_temp_path'] }}" width="200" height="130"></td>
        </tr>
        <tr>
          <td>投稿Text</td>
          <input type="text" readonly class="form-control-plaintext" value={{ $data['product_content'] }}>
        </tr>
        <br>
        <div class="form_item"><input type="submit" name="action" id="button" value="投稿する" class="btn btn-primary"></div>
      </form>
    </div>
  </body>
</html>
@endsection

{{-- <div class="card" style="width: 18rem">
  <img src="{{ $data['read_temp_path'] }}" class="card-img-top">
  <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
  <div class="card-body">
    <h5 class="card-title">投稿内容</h5>
    <p class="card-text">{{ $data['product_content'] }}</p>
    <input type="submit" name="action" id="button" value="投稿する" class="btn btn-primary">
  </div>
</div> --}}