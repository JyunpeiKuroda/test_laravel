@extends('layouts.layout')
@section('title', '確認')
@section('content')
    <form  action="new_complete" method="post">
        @csrf
        <table border="1">
            <tr>
                <td>画像</td>
                <td><img src="{{ $data['read_temp_path'] }}" width="200" height="130"></td>
            </tr>
            <tr>
                <td>投稿Text</td>
                <td>{{ $data['product_content'] }}</td>
            </tr>
        </table>
        <input type="submit" name="action" value="投稿" />
    </form>
@endsection