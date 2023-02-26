@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center col-md-4'><a href="{{ route('users.index') }}" style="color:lime">ユーザ管理</a></th>
                    <th scope="col" class='text-center col-md-4' style="color:white">投稿管理</th>
                    <th scope="col" class='text-center col-md-4'><a href="{{ route('reqs.index') }}" style="color:lime">要望管理</a></th>
                </tr>
            </thead>
        </table>
        <div class="form-group">
            <label for="exampleFormControlSelect1"></label>
            <form action="{{ route('limits.index')}}" method="get">
                <select name='game_id' class="form-control" id="exampleFormControlSelect1">
                    <option value=''></option>
                    @foreach($games as $game)
                    @if($game['id'] == $request->game_id)
                    <option value="{{ $game['id']}}" selected>{{ $game['name'] }}</option>
                    @else
                    <option value="{{ $game['id']}}">{{ $game['name'] }}</option>
                    @endif
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="タイトル" @if(isset($request->title)) value="{{ $request->title }}" @endif>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="user_name" placeholder="表示名" @if(isset($request->user_name)) value="{{ $request->user_name }}" @endif>
                </div>
                <div class='row justify-content-center'>
                    <button type='submit' class='btn btn-outline-success mt-1' style="color:lime">検索</button>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center col-md-12' style="color:white">&emsp;&emsp;&emsp;&emsp;&emsp;投稿一覧</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope='col' class='list'>
                        <a href="{{ route('posts.show', ['post' => $post['id']]) }}" style="color:lime">{{ $post['title'] }}</a>
                        <form action="{{route('posts.destroy', ['post' => $post['id']]) }}" method="post" class="float-right">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に実行しますか？");'>
                        </form>
                    </th>
                </tr>
                @endforeach
                <tr>
                    <th scope='col' class="row justify-content-center">
                        {{ $posts->links() }}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
<style>
    .list:hover {
        background-color: #003b19;
    }
</style>