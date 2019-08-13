<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;


global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
    <style>
    body{};
    </style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt){
    return "<{$tag}>".$txt."</{$tag}>";
}

class HelloController extends Controller{
    public function index1($id = 'no id', $pass = 'unknown', Request $request){
        return <<<EOF
            <html>
                <head>
                    <title>Index</title>
                    <style>
                        h1{padding-left: 10px;}
                    </style>
                </head>
                <body>
                    <h1>Index</h1>
                    <ul>
                        <li>ID: {$id}</li>
                        <li>PASS: {$pass}</li>
                    </ul>
                    <form method = "GET" action = "/index">
                        <label>name</label>
                        <input type="text" name="email" value = "{$request->input("email")}">
                        <label>password</label>
                        <input type="text" name="password">
                        <input type="checkbox">remember
                        <button type="submit">ログイン</button>
                    </form>
                    <h2>request</h2>
                    <pre>{$request}</pre>


                </body>
            </html>
EOF;

    }

    public function index2(){
        global $head, $style, $body, $end;

        $html = $head.tag('title', 'index2').$style.$body
            .tag('h1', 'Index2').tag('p', 'this is index2')
            .'<a href = "/index2/other">go to other</a>'
            .$end;
        return $html;
    }

    public function other(){
        global $head, $style, $body, $end;

        $html = $head.tag('title', 'other').$style.$body
            .tag('h1', 'OTHER').tag('p', 'this is other page').$end;
        return $html;
    }

    public function __invoke(){
        return <<<EOF
        <html>
            <head>
                <title>helloInvoke</title>
                <style></style>
            </head>
            <body>
                <h1>Single Action</h1>
            </body>
        </html>
EOF;

    }

    public function index3(Request $request, Response $response){
        $html = <<<EOF
        <html>
            <head>
                <title>Request & Response</title>
                <style></style>
            </head>
            <body>
                <h1>hello</h1>
                <h3>Request</h3>
                <pre>{$request}</pre>
                <h3>Response</h3>
                <pre>{$response}</pre>
            </body>
        </html>
EOF;
            $response->setContent($html);
            return $response;
    }


    public function indexRequest(Request $request){
        $data = [
            'msg'=> 'this is a sample page with a php-template',
            'id' => $request->id
    ];
        return view('hello.indexRequest', $data);
    }

    // public function index(){
    //     return view('hello.index');
    // }
    // public function post(Request $request){
    //     return view('hello.index', ['msg' => $request->msg]);
    // }


    public function indexLayout(Request $request){
        $validator = Validator::make($request->query(),[
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()){
            $msg = 'クエリーに問題があります。';
        }else{
            $msg = 'ID/PASSを受け付けました。フォームを入力してください。';
        }
        // if($request->hasCookie('msg')){
        //     $msg = 'Cookie: '.$request->cookie('msg');
        // }else{
        //     $msg = '※クッキーはありません。';
        // }
        return view('hello.indexLayout', ['msg' => $msg]);
    }

    public function post(Request $request){
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で入力してください。',
            'age.min' => '年齢は0歳以上で記入してください。',
            'age.max' => '年齢は200歳以下で記入してください。',
        ];
        $validator =Validator::make($request->all(), $rules, $messages);

        $validator->sometimes('age', 'min:0',function($input){
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'max:200',function($input){
            return !is_int($input->age);
        });
        if($validator->fails()){
            return redirect('/hellolayout')
                ->withErrors($validator)
                ->withInput();
        }
        // $validate_rule = [
        //     'msg' => 'required',
        // ];
        // $this->validate($request, $validate_rule);
        // $msg = $request->msg;
        // $response = new Response(view('hello.indexLayout',['msg' => '「'.$msg.'」をクッキーに保存しました。']));
        // $response->cookie('msg', $msg, 100);
        // return $response;
    }

    public function indexDB(Request $request){
        $items = DB::table('people')->get();
        return view('hello.indexdb', ['items' => $items]);
    }
    // public function post(Request $request){
    //     $items = DB::table('people')->get();
    //     return view('hello.indexdb', ['items' => $items]);
    // }

    public function add(Request $request){
        return view('hello.add');
    }
    public function create(Request $request){
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->insert($param);
        return redirect('/hellodb');
    }

    public function edit(Request $request){
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }
    public function update(Request $request){
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/hellodb');
    }

    public function del(Request $request){
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }
    public function remove(Request $request){
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/hellodb');
    }

    public function show(Request $request){
        $page = $request->page;
        $items = DB::table('people')->offset($page)->limit(3)->get();
        return view('hello.show', ['items' => $items]);
    }

}
