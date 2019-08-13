@extends('layouts.app')
@section('content')
<div class = "container">
    @foreach($ans as $ans_key => $ans_value)
        <div class = "row">
            <div class = "key">{{$ans_key}} : </div>
            <div class = "value">
                @if($ans_key != 'ご意見')
                {{$ans_value}}
                @else
                {!!$ans_value!!}
                @endif
            </div>
        </div>
    @endforeach
    <div class = "button">
        <button onclick="location.href='/homework/system/answer/index'">一覧に戻る</button>
        <form action="/homework/system/answer/{{$id}}" method = "post" id = "delete_this_id">
            <button tyoe = "submit" id = "delete_this_btn">削除</button>
        </form>

    </div>
</div>
@endsection
