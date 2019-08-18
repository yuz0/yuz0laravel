
@extends('layouts.app')
    @section('content')
        <div class = "container">
            <div class = "search">
                <h2>アンケート管理システム</h2>

                <div class = "row">
                    <div class = "name_search item">
                        <h3>氏名</h3>
                        <input type="text" name = "s_name" form = "search_id">
                    </div>
                    <div class = "age_search item">
                        <h3>年代</h3>
                        <select name="ages" form = "search_id">
                            <option value = "0">全て</option>
                            @foreach($param as $param_value)
                                <option value="{{$param_value->id}}">{{$param_value->age}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class = "gender_search item">
                        <h3>性別</h3>
                        <label><input type="radio" name = "gender" form = "search_id" value = "0" checked>全て</label>
                        <label><input type="radio" name = "gender" form = "search_id" value = "1">男性</label>
                        <label><input type="radio" name = "gender" form = "search_id" value = "2">女性</label>
                    </div>
                </div>
                <div class = "row">
                    <div class = "search_date">
                        <input type="date" name = "created_at_from" form = "search_id">
                         ~ <input type="date" name = "created_at_until" form = "search_id">
                    </div>
                    <div class = "send_email_check">
                        メール送信許可 <input type="checkbox" name = "send_email" value = "1" form = "search_id"> 許可のみ
                    </div>
                </div>
                <div class = "row">
                    <div class = "keyword">キーワード <input type="text" name = "keyword" form = "search_id"></div>
                </div>
                <div class = "row">
                    <div class = "button">
                        <button onclick="location.href='/homework/system/answer/index'" id = "reset_btn">リセット</button>
                        {{-- 　form id tekito --}}
                        <form action="/homework/system/answer/index" method = "post" id = "search_id">
                            <input type="submit" value = "検索">
                        </form>

                    </div>
                </div>

            </div>
            <div class = "table">
                <form action="/homework/system/answer/index/delete/answer" method = "post" id = "delete_id">
                    <button id = "delete_btn">選択したアンケートを削除</button>
                </form>
                <div class = "page">
                    <p>{{$item->firstItem()}}~{{$item->lastItem()}}件</p>
                    {{$item->links()}}
                </div>
                <table>
                    <tr class = "item_title">
                        <th class><input type="checkbox" id = "all_check"> 全選択</th>
                        <th class = "id">ID</th>
                        <th class = "name">名前</th>
                        <th class = "gender">性別</th>
                        <th class = "age">年代</th>
                        <th class = "feedback">内容</th>
                    </tr>
                    @foreach($item as $item_value)
                        <tr>
                            <th class = "delete">
                                <input type="checkbox" name = "delete[]" value = "{{$item_value->id}}"
                                    form = "delete_id"> 選択</th>
                            <td class = "id">{{$item_value->id}}</td>
                            <td class = "name">{{$item_value->fullname}}</td>
                            <td class = "gender">
                                @if($item_value->gender == 1)
                                男
                                @else
                                女
                                @endif
                            </td>
                            <td class = "age">
                                @foreach($param as $value)
                                    @if($item_value->age_id == $value->id)
                                        {{$value->age}}
                                    @endif
                                @endforeach
                            </td>
                            <td class = "feedback">
                                @if(mb_strlen($item_value->feedback) > 15)
                                    {{mb_substr($item_value->feedback, 0, 15)}}...
                                @else
                                    {{$item_value->feedback}}
                                @endif
                            </td>
                            <th><button onclick="location.href='/homework/system/answer/{{$item_value->id}}'">詳細</button></th>
                        </tr>
                    @endforeach
                </table>
                @isset($exist)
                    @if($exist)
                        <tr>該当するアンケートはありません</tr>
                    @endif
                @endisset
            </div>
        </div>
    @endsection

