@extends('layouts.imaxApp')

@section('title', '映画館紹介ページ')

@section('stylesheet')
<style>
    #info{
        padding: 10px 0 20px 0;
    }
        .item{
            display: flex;
            padding-bottom: 10px;
        }
    iframe{
        width: 100%;
        height: 300px;
    }
</style>
@endsection

@section('main')
<div class = "row">
    <h2 class = "col-12">{{$theater->theaterName}}</h2>
    <div class = "col-md-6">
        <div id = "info">
            <div class = "item">
                <div>場所:</div>
                <div>{{$theater->area}}</div>
            </div>
            <div class = "item">
                <div>スペック:</div>
                <div>{{$theater->spec}}</div>
            </div>
            <div class = "item">
                <div>スクリーンサイズ:</div>
                <div>{{$theater->size}}</div>
            </div>
            <div class = "item">
                <div>座席数(車椅子):</div>
                <div>{{$theater->seats}}</div>
            </div>
            <div>{{$theater->explain}}</div>
            <a href="{{$theater->link}}" target="_blank">公式サイトへ</a>
        </div>
    </div>
    <div class = "col-md-6">
        <iframe src="https://maps.google.co.jp/maps?output=embed&q={{$theater->map}}"></iframe>
    </div>
</div>
<div id = "form">
    <form action="/feedback" method = "get">
        <input type="hidden" name = "name" value = "{{$theater->name_eng}}">
        <input type="submit" value = "フィードバックを送る">
    </form>
</div>
@endsection
