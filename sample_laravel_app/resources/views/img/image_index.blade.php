@extends('layouts.layout')
@section('title', '一覧画面')
@section('content')

{{-- @if (session('status'))
<div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">{{ session('status') }}</div>
@endif --}}

{{-- {!! Form::open(['url' => 'photos/store', 'files' => true,'method' => 'post']) !!}
{!! Form::label('fileName', 'アップロード') !!}
{!! Form::file('fileName') !!}
{!! Form::submit('アップロードする') !!}
{!! Form::close() !!} --}}

{{-- <h2>投稿一覧画面(image_index)</h2>
<hr color="#000000" style="height:1px;"> --}}

{{-- @foreach ($photos ?? '' as $photo) --}}
{{-- <div class="panel panel-default"> --}}
    {{-- <div>{{$topic_all}}</div> --}}
    {{-- <div class="panel-heading">アップロードした日付：{{$photo->created_at}}</div> --}}
    <!-- List group -->
    {{-- <ul class="list-group"> --}}
    {{-- <li class="list-group-item"><img src="{{$photo->path}}"></li> --}}
    {{-- </ul>
</div> --}}
{{-- @endforeach --}}

{{-- @endsection --}}


    <!-- 現在のタスク -->
    @if (count($topic_all) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                現在のタスク
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Topic</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($topic_all as $topic_all)
                            <tr>
                                <td class="table-text">
                                    <!-- 画像 -->
                                    <div class="list-group-item"><img src="{{$topic_all->img_path}}" width="400" height="300"></div>
                                    <!-- 投稿内容 -->
                                    <div>{{$topic_all->content}}</div>
                                    <!-- 投稿作成時間 -->
                                    <div>{{$topic_all->created_at}}</div>
                                </td>

                                {{-- <!-- 投稿内容 -->
                                <td class="table-text">
                                    <div>{{$topic_all->content}}</div>
                                </td> --}}

                                <td>
                                    <!-- TODO: 削除ボタン -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection