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

<h2>投稿一覧画面(image_index)</h2>
<hr color="#000000" style="height:1px;">

{{-- @foreach ($photos ?? '' as $photo) --}}
<div class="panel panel-default">
    {{-- <div class="panel-heading">アップロードした日付：{{$photo->created_at}}</div> --}}
    <!-- List group -->
    <ul class="list-group">
    {{-- <li class="list-group-item"><img src="{{$photo->path}}"></li> --}}
    </ul>
</div>
{{-- @endforeach --}}

@endsection