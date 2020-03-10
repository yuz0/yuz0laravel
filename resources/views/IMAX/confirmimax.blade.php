@extends('layouts.imaxApp')

@section('title', '以下の内容で送信しますか？')

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
        #feedback > h2{
            text-align: center;
            padding-bottom: 20px;
        }

        #input_area_wrapper{
            background-color: #fff;
        }
        #input_area{
            padding: 20px;
        }
        .item{
            display: flex;
            padding-bottom: 5px;
        }
            .item_name{
                padding-right: 30px;
            }
            .button{
                margin: 30px auto;
            }

</style>
@endsection

@section('main')
<div id = "feedback">
    <h2>以下の内容で送信しますか？</h2>
    <div id = "input_area_wrapper" class = "shadow">
        <div id = "input_area">
            @foreach($items as $key => $value)
            <div class = "item">
                <div class = "col-4 item_name">{{$key}}</div>
                <div>{{$value}}</div>
            </div>
            @endforeach
            <div>
                <form action="/feedback/thankyou" method = "post">
                {{ csrf_field() }}
                @foreach($send as $key => $value)
                <input type="hidden" name = "{{$key}}" value = "{{$value}}">
                @endforeach
                <div class = "item">
                    <button type = "button" onclick="history.back()" class = "button">戻る</button>
                    <input type="submit" class = "button">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
