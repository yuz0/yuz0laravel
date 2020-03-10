@extends('layouts.imaxApp')

@section('title', 'IMAX Dolby review シアター検索一覧')

@section('stylesheet')
<style>
    .row{
        padding: 10px;
        margin-bottom: 10px;
    }
    ul{
        padding-left: 10px;
    }
</style>
@endsection

@section('main')
@foreach($theaters as $theater)
<div class = "row shadow">
    <div class = "col-6 col-lg-2">
        <img src="{{asset('storage/'.$theater->img)}}" alt="" width = "100px">
    </div>
    <div class = "col-6 col-lg-2">
        <div>評価</div>
        <div>
            @if($stars[$theater->id] != 0)
                @for($i = 0; $i < $stars[$theater->id]; $i++)
                <img src="{{asset('storage/star.png')}}" alt="" width = "16px">
                @endfor
            @else
                <p>評価がありません</p>
            @endif
        </div>
    </div>
    <div class = "col-12 col-lg-8">
        <h3><a href="/theaterinfo/{{$theater->name_eng}}">
            {{$theater->theaterName}}</a></h3>
        <ul style="list-style: none;">
            <li>{{$theater->area}}</li>
            <li>{{$theater->spec}}</li>
        </ul>
    </div>
</div>
@endforeach
@isset($exist)
@if($exist)
    <div class="alert alert-primary text-center" role="alert">該当する映画館がありません。</div>
@endif
@endisset
<button type = "button" onclick="history.back()">トップへ</button>
@endsection
