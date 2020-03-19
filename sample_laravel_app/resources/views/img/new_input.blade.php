@extends('layouts.layout')
@section('title', '入力')
@section('content')
    <form enctype="multipart/form-data" action="new_confirm" method="post" id="form">
        @csrf
        ファイル：
        <input type="file" name="imagefile" value=""/><br /><br />

        商品名：<br />
        <input type="text" name="content" size="50" value="{{ old('name') }}"/><br /><br />

        <input type="submit" name="confirm" id="button" value="確認" />
    </form>
@endsection