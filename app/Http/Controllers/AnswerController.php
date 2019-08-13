<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Answer;

class AnswerController extends Controller
{
    public function answer(){
        $item = DB::table('answers')->paginate(3);
        $param = DB::table('ages')->get();

        $users = \App\User::paginate(3);
        $users->withPath('/homework/system/answer/index');

        return view('Homework.indexAnswer', [
            'item' => $item,
            'param' => $param,
            ]);
    }

    public function delete(Request $request){
        if(empty($request->delete)){
            return redirect('/homework/system/answer/index');
        }
        foreach($request->delete as $del_id){
            DB::table('answers')->where('id', $del_id)->delete();
        }

        return redirect('/homework/system/answer/index');
    }

    public function search(Request $request){
        $s_name = $request->input('s_name');
        $age_id = $request->input('ages');
        $gender = $request->input('gender');
        $from = $request->input('created_at_from');
        $until = $request->input('created_at_until');
        $send_email = $request->input('send_email');
        $keyword = $request->input('keyword');

        $query = Answer::query();

        if(!empty($s_name)) {
            $query->where('fullname', 'LIKE', '%'.$s_name.'%');
        }

        if($age_id != 0) {
            $query->where('age_id', $age_id);
        }

        if($gender != 0) {
            $query->where('gender', $gender);
        }

        if(!empty($from) && !empty($until)){
            $query->whereBetween('created_at', [$from, $until]);
        }

        if($send_email == 1){
            $query->where('send_email', 1);
        }

        if(!empty($keyword)) {
            $query->where('email', 'LIKE', '%'.$keyword.'%')->orWhere('feedback', 'LIKE', '%'.$keyword.'%');
        }

        $item = $query->paginate(3);


        $param = DB::table('ages')->get();

        $users = \App\User::paginate(3);
        $users->withPath('/homework/system/answer/index');

        return view('Homework.indexAnswer', [
            'item' => $item,
            'param' => $param,
            ]);
    }

    public function show($id, Request $request){
        $item = Answer::where('id', $id)->first();
        $param = DB::table('ages')->get();

        function e($value, $doubleEncode = false){
            if ($value instanceof Htmlable) {
                return $value->toHtml();
            }
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
        }

        $ans = [
            'ID' => $id,
            '氏名' => $item->fullname,
            '性別' => $item->gender == 1 ? '男性' : '女性',
            '年代' => $param[$item->age_id]->age,
            'メールアドレス' => $item->email,
            'メール送信可否' => $item->send_email ? '送信許可' : '送信を許可しない',
            'ご意見' => nl2br(e($item->feedback), false)
            // $item->feedback,
        ];

        return view('Homework.personalAnswer', [
            'id' => $id,
            'item' => $item,
            'param' => $param,
            'ans' => $ans,
        ]);
    }

    public function delete_this($id){
        DB::table('answers')->where('id', $id)->delete();
        return redirect('/homework/system/answer/index');
    }
}
