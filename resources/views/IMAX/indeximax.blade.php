@extends('layouts.imaxApp')

@section('title', 'IMAX Dolby review -Top Page')

@section('stylesheet')
<style>
    #searching-box{
        padding: 10px 20px;
        background-color: #ddd;
    }
        #searching-box > h2{
            padding-bottom: 5px;
        }
        .row_title{
            padding-bottom: 10px;
        }
        .item-title{
            width: 150px;
            min-width: 100px;
            padding-left: 10px;
        }
        .item_value{
            text-align: center;
        }
        select{
            width: 300px;
        }
        .item{
            padding-bottom: 10px;
        }
        @media screen and (min-device-width: 600px){
            .item{
                display: flex;
            }
        }

        #search{
            padding-top: 10px;
        }

        ul{
            padding-left: 20px;
            list-style: none;
        }
            .spec_title{
                background-color: #777;
                color: white;
                padding-left: 10px;
            }

        #map{
            width: 100%;
            height: 250px;
        }
        @media screen and (min-width: 720px){
            #map{
                width: 640px;
                height: 400px;
            }
        }

    @media screen and (max-device-width: 720px){
        h2{
            padding-left: 0;
        }
        .row_title{
            text-align: center;
        }
    }
    #img-list{
        overflow-y:scroll;
        display: flex;
    }
    @media screen and (min-device-width: 720px){
        #img-list{
            justify-content: center;
        }
    }
    .movie-img{
        padding: 20px;
    }
</style>
@endsection

@section('main')
<div class = "row">
    <div id = "searching-box_wrapper" class = "col-lg-6">
        <div id = "searching-box">
            <h2 class = "row_title">映画館を探す</h2>
            {{-- <div class = "item">
                <div class = "item-title">キーワードを入力して下さい</div>
                <div><input type="text"></div>
            </div> --}}
            <div class = "item">
                <div class = "item-title">地方検索</div>
                <div class = "item_value">
                    <select name="s_region"form = "search">
                        <option value = "0">選択なし</option>
                        @foreach($regions as $key => $region)
                        <option value="{{$key + 1}}">{{$region}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class = "item">
                <div class = "item-title">映画館の会社</div>
                <div class = "item_value">
                    <select name="s_corp" form = "search">
                        <option value = "0">選択なし</option>
                        @foreach($theatersCorps as $key => $theatersCorp)
                        <option value="{{$key + 1}}">{{$theatersCorp}}</option>
                        @endforeach
                        <option value="10">その他</option>
                    </select>
                </div>
            </div>
            <div class = "item">
                    <div class = "item-title">スペック</div>
                    <div class = "item_value">
                        <select name="s_spec" form = "search">
                            <option value = "0">選択なし</option>
                            <option value = "1">4K (IMAX & Dolby Cinema)</option>
                            <option value = "2">IMAX</option>
                            <option value = "3">Dolby Atoms</option>
                        </select>
                    </div>
                </div>
            <div><form action="/" method = "post" id = "search">
                <div class = "text-center"><input type="submit" value = "検索する" class = "px-3"></div>
            </form></div>
        </div>
    </div>
    <div class = "col-lg-6">
        広告エリア
    </div>
</div>


<div class = "row">
    <h2 class = "col-12 row_title">おすすめ映画館</h2>
    <div class = "col-md-6">
        <div class = "pickup_spec">
            <h3 class = "spec_title">IMAXレーザー/GTテクノロジー</h3>
            <ul>
                <li><a href="/theaterinfo/grandcinemasunshine">
                    グランドシネマサンシャイン</a></li>
                <li><a href="/theaterinfo/109cinemas_osaka-expocity">109シネマズ大阪エキスポシティ</a></li>
            </ul>
        </div>
    </div>
    <div class = "col-md-6">
        <div class = "pickup_spec">
            <h3 class = "spec_title">Dolby Cinema</h3>
            <ul>
                <li><a href="/theaterinfo/t-joy_hakata">Tジョイ 博多</a></li>
                <li><a href="/theaterinfo/movix_saitama">MOVIX さいたま</a></li>
                <li><a href="/theaterinfo/umeda_burg7">梅田ブルク7</a></li>
                <li><a href="/theaterinfo/marunouchi_smt">丸の内ピカデリー</a></li>
            </ul>
        </div>
    </div>
</div>
<div class = "row">
    <div class = "mx-auto"><iframe id = "map" src="https://www.google.com/maps/d/embed?mid=1DtoCorEfa806eB92JhijFs39kUhHlHc0&hl=ja"></iframe></div>
</div>

<div id = "movie-list">
    <h2>今IMAXでやっている映画</h2>
    <div id = "img-list">
        @for($i = 0; $i < count($theater_imgs); $i++)
        @break($i == 5)
            <div class = "movie-img">
                <img src="{{$theater_imgs[$i]}}" alt="" width = "150px">
            </div>
        @endfor
    </div>
</div>
@endsection
