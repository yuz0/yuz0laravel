@extends('layouts.imaxApp')

@section('title', 'フィードバックをお聞かせください')

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
                width: 150px;
            }
        @media screen and (min-width: 720px){
            #feedback-text{
                display: flex;
            }
        }
        @media screen and (max-device-width: 720px){
            #textarea{
                text-align: center;
            }
        }
            #submit{
                margin: 30px auto;
            }

</style>
@endsection

@section('main')
<div id = "feedback">
    <h2>フィードバックをお聞かせください</h2>
    <div id = "input_area_wrapper" class = "shadow">
        <form action="/feedback" method = "post">
        {{ csrf_field() }}
        <div id = "input_area">
            <div class = "item">
                <div class = "item_name"><p>ニックネーム</p></div>
                <div><input type="text" name = "name" value = "{{old('name')}}"></div>
            </div>
            @if($errors->has('name'))
            <p class="alert alert-danger">※{{$errors->first('name')}}</p>
            @endif

            <div class = "item">
                <div class = "item_name"><p>映画館</p></div>
                <div>
                    <select name="theaterId" id="">
                        <option value=""
                        @if(empty($name))
                        selected
                        @endif
                        >選択してください</option>
                        @foreach($theaters as $theater)
                        <option value="{{$theater->id}}"
                            @if(old('theaterId') == $theater->id)
                            selected
                            @elseif(($name == $theater->name_eng))
                            selected
                            @endif
                            >
                        {{$theater->theaterName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if($errors->has('theaterId'))
            <p class="alert alert-danger">※{{$errors->first('theaterId')}}</p>
            @endif

            <div class = "item">
                <div class = "item_name"><p>評価</p></div>
                <div>
                    <select name="evaluation" id="">
                        @foreach($stars as $key => $value)
                        <option value="{{$key}}"
                        @if(old('evaluation') == $key)
                        selected
                        @endif
                        >{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if($errors->has('evaluation'))
            <p class="alert alert-danger">※{{$errors->first('evaluation')}}</p>
            @endif

            <div id = "feedback-text">
                <div class = "item_name"><p>フィードバック</p></div>
                <div id = "textarea">
                    <textarea name="feedback" id="" cols="30" rows="5">{{old('feedback')}}</textarea>
                </div>
            </div>
            <div class = "item"><input type="submit" id = "submit"></div>
        </div>
        </form>
    </div>
</div>
@endsection
