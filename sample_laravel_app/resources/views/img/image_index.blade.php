@extends('layouts.layout')
@section('title', '一覧画面')
@section('content')
    <div class="panel-panel-default">
        @foreach ($topics_all as $topic_all)
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <tr>
                        <div class="list-group-item">
                            <div class="card-title">
                                <p>user名(◯◯◯◯◯◯◯)</p>
                            </div>
                            <!-- 削除ボタン -->
                            <div class="card-delete-button">
                                <form
                                    style="display: inline-block;"
                                    method="post"
                                    action="/image_index/delete/{{$topic_all->topic_id}}">
                                    {{-- action="{{ route('Topics.delete') }}" --}}
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
                                </form>
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
@endsection