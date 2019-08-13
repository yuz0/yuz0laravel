@extends('layouts.homeworkapp')

@section('title', '内容確認')

@section('content')
    <div class = "item">
        <h2 class = "col-3">氏名 <span>※</span></h2>
        <p>{{$item['fullname']}}</p>
    </div>
    <div class = "item">
        <h2 class = "col-3">性別 <span>※</span></h2>
        <p>{{$gender}}</p>
    </div>
    <div class = "item">
        <h2 class = "col-3">年代 <span>※</span></h2>
        @foreach($param as $value)
            @if($item['age_id'] == $value->id)
                <p>{{$value->age}}</p>
            @endif
        @endforeach
    </div>
    <div class = "item">
        <h2 class = "col-3">メールアドレス <span>※</span></h2>
        <p>{{$item['mail']}}</p>
    </div>
    <div class = "item">
        <h2 class = "col-3">メール送信可否</h2>
        <p>{{$is_send_email}}</p>
    </div>
    <div class = "item">
        <h2 class = "col-3">ご意見</h2>
        <p>{!! nl2br(e($item['feedback']), false) !!}</p>
    </div>

    <form action="/homework/thankyou" method = "post">
        @foreach($item as $item_name => $item_value)
        <input type="hidden" name = "{{$item_name}}" value = "{{$item_value}}">
        @endforeach
        <div class = "button">
            <button type = "button" onclick="history.back()">戻る</button>
            <input type="submit" value = "送信">
        </div>
    </form>
@endsection
