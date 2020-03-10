@extends('layouts.imaxApp')

@section('title', 'ご意見をお送りいただきありがとうございました。')

@section('stylesheet')
<style>
    main{
        background-color: #eee;
    }
    #feedback{
        padding: 30px 0;
        max-width: 520px;
        margin: 0 auto;
    }
    .content{
        text-align: center;
    }
        .content h1{
            font-weight: normal;
            font-size: 20px;
            line-height: 200px;
        }
    .button{
        text-align: center;
    }

</style>
@endsection

@section('main')
<div id = "feedback">
    <div class = "content"><h1>ご意見をお送りいただきありがとうございました。</h1></div>
    <div class = "button"><input type = "button" onclick="location.href='/'" value = "トップページへ"></div>
</div>
@endsection
