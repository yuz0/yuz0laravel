@extends('layouts.homeworkapp')

@section('title', 'システムへのご意見をお聞かせください')

@section('header')
    {{-- @if()
    <h2 class = "font-color-white">アンケートを送信しました</h2>
    @endif --}}
@endsection

@section('content')
    <form action　=　"/homework" method = "post">
        {{ csrf_field() }}
        {{-- <input type="hidden" name = "id"> --}}
        <div class = "item">
            <h2 class = "col-3">氏名 <span>※</span></h2>
            <input type="text" name = "fullname" value = "{{old('fullname')}}">
        </div>
        @if($errors->has('fullname'))
            <p class="alert alert-danger">※{{$errors->first('fullname')}}</p>
        @endif

        <div class = "item">
            <h2 class = "col-3">性別 <span>※</span></h2>
            <label><input type="radio" name = "gender" value = "1"
                @if(old('gender') == null | 1)
                    checked
                @endif
            ><p>男性</p></label>
            <label><input type="radio" name = "gender" value = "2"
                @if(old('gender') == 2)
                    checked
                @endif
            ><p>女性</p></label>
        </div>

        <div class = "item">
            <h2 class = "col-3">年代 <span>※</span></h2>
            <select name="age_id">
                <option>選択して下さい</option>
                @foreach($param as $value)
                    <option value = "{{$value->id}}"
                        @if(old('age_id') == $value->id)
                            selected
                        @endif
                    >{{$value->age}}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has('age_id'))
            <p class="alert alert-danger">※{{$errors->first('age_id')}}</p>
        @endif

        <div class = "item">
            <h2 class = "col-3">メールアドレス <span>※</span></h2>
            <input type="text" name = "mail" value = "{{old('mail')}}">
        </div>
        @if($errors->has('mail'))
            <p class="alert alert-danger">※{{$errors->first('mail')}}</p>
        @endif

        <div class = "item">
            <h2 class = "col-3">メール送信可否</h2>
            <div class = "send_email">
                <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
                <label><input type="checkbox" name = "send_email" value = "1"
                    @if(old('send_email') == null | 1)
                        checked
                    @endif
                ><p>送信を許可します</p></label>
            </div>
        </div>

        <div class = "item">
            <h2 class = "col-3">ご意見</h2>
            <textarea name="feedback" cols="50" rows="10">{{old('feedback')}}</textarea>
        </div>
        <div class = "button"><input type="submit" value = "送信"></div>
    </form>
@endsection
