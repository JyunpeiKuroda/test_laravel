@extends('layouts.layout')
@section('title', '一覧画面')
@section('content')

    <!-- 現在のタスク -->
    {{-- @if (count($topic_all) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                投稿一覧画面
            </div> --}}
    <div class="panel-panel-default">
        @foreach ($topics_all as $topic_all)
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <tr>
                        <div class="list-group-item">
                            <div class="card-title">
                                <p>user名(◯◯◯◯◯◯◯)</p>
                            </div>
                            <div class="card-delete-button">
                                <button>
                                    <a href="#" class="card-delete">投稿を削除</a>
                                </button>
                            </div>
                            <br>
                            <div class="card-body">
                                <div class="card-min-img">
                                    <img src="{{$topic_all->img_path}}" class="card-img-top"   width="400" height="300" >
                                </div>
                                <br>
                                <div class="card-main-like">
                                    <a href="#" class="card-link">いいね一覧</a>
                                    <a href="#" class="card-link">♡</a>
                                </div>
                                <div class="card-main-content">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{$topic_all->content}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <br>
                </table>
            </div>
        @endforeach
    </div>
    <!-- page control -->
    <div class="d-flex justify-content-center">
        {!! $topics_all->links() !!}
    </div>
        {{-- </div>
    @endif --}}
@endsection








        {{-- <!-- 画像 -->
        <img src="{{$topic_all->img_path}}" width="400" height="300">
        <!-- 投稿内容 -->
        <div>{{$topic_all->content}}</div>
        <!-- 投稿作成時間 -->
        <div>{{$topic_all->created_at}}</div> --}}