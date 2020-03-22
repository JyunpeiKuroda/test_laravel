@extends('layouts.app')
@section('title', '投稿アプリ')

@section('content')
    @section('maincopy', '投稿してください')

    <!-- 投稿フォーム -->
    <form action="/post" method="post">
        {{ csrf_field() }}
        <!-- これで認証ユーザーでの記事投稿が可能になる -->
        <input type="hidden" name="user_id" value="{{ $authUser->id }}">
        @if($errors->has('title'))
            <div class="error_msg">{{ $errors->first('title') }}</div>
        @endif
        <input type="text" class="form" name="title" placeholder="タイトル" value="{{ old('title') }}">

        @if($errors->has('message'))
            <div class="error_msg">{{ $errors->first('message') }}</div>
        @endif
        <div>
            <textarea class="form" name="message" placeholder="メッセージ">{{ old('message') }}</textarea>
        </div>
        <input type="submit" class="create" value="投  稿">
    </form>

    <!-- 記事描画部分 -->
    @if(count($items) > 0)
        @foreach($items as $item)
            <div class="alert alert-primary" role="alert">
                @if($authUser->id === $item->user_id)
                <!-- 主キーと外部キーが同じ場合 -> リンク付きテキストと削除ボタン表示 -->
                <a href="/post/{{ $item->id }}" class="alert-link">{{ $item->title }}</a>
                <div>{{ $item->message }}</div>
                <form action="/post/{{ $item->id }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="delete" value="削除">
                </form>
                @else
                <!-- 主キーと外部キーが違う場合 -> 通常のテキストのみ表示 -->
                <span class="alert-link">{{ $item->title }}</span>
                <div>{{ $item->message }}</div>
                @endif
                <!-- この部分はいろいろ出し方を変えられますのでおのおのでカスタマイズしてみてください -->
            </div>
        @endforeach
    @else
        <div>投稿記事がありません</div>
    @endif
@endsection