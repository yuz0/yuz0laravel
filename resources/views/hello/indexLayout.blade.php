@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    上書き？
@endsection

@section('content')
    <p>content part</p>
    <p>this is the link to <middleware>google.com</middleware></p>
    <p>this is the link to <middleware>yahoo.co.jp</middleware></p>
    <p>{{$msg}}</p>
    @if(count($errors) > 0)
        <p>入力にエラーがあります。再入力してください。</p>
    @endif
    <table>
        <form action="/hellolayout" method = "post">
            {{csrf_field()}}
            @if($errors->has('msg'))
                <tr><th>ERROR</th><td>{{$errors->first('msg')}}</td></tr>
            @endif
            <tr><th>Message: </th><td><input type="text" name = "msg" value = "{{old('msg')}}"></td></tr>
            <tr><th></th><td><input type="submit" value = "send"></td></tr>

        </form>
    </table>
@endsection

@section('footer')
copyright 2019 yuzo.
@endsection
