<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Validator;


use Carbon\Carbon;

class HomeworkController extends Controller
{
    public function index(Request $request){
        $param = DB::table('ages')->get();


        return view('Homework.indexHomework', ['param' => $param]);
    }

    public function confirm(Request $request){
        $validate_rules = [
            'fullname' => 'required | string | max:200',
            'gender' => 'required | integer ',
            'age_id' => 'required | integer ',
            'mail' => 'required | email | max:255',
            'send_email' => 'integer ',
            'feedback' => 'max:1000',
        ];
        $messages =[
            'required' => 'この項目は必須です',
            'age_id.integer' => 'この項目は必須です',
            'email' => 'メールアドレスを入力して下さい',
            'feedback.max:1000' => '1000字以内でお願いします',
        ];
        $request->validate($validate_rules, $messages);
        //$item[]配列
        $item = [
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'age_id' => $request->input('age_id'),
            'mail' => $request->input('mail'),
            'send_email' => $request->input('send_email'),
            'feedback' => $request->input('feedback'),
        ];

        if($item['send_email'] != 1){
            $item['send_email'] = 0;
        }

        $param = DB::table('ages')->get();



        //$gender,$age,$is_aend_email, +feedback
        $gender = $item['gender'] == 1 ? '男性' : '女性';

        // if($item['gender'] == 1){
        //     $gender = '男性';
        // }elseif($item['gender'] == 2){
        //     $gender = '女性';
        // }


        $is_send_email = $item['send_email'] ? '送信許可' : '送信を許可しない';

        // if($item['send_email'] == 1){
        //     $is_send_email = '送信許可';
        // }elseif($item['send_email'] == 0){
        //     $is_send_email = '送信を許可しない';
        // }

        function e($value, $doubleEncode = false){
            if ($value instanceof Htmlable) {
                return $value->toHtml();
            }
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
        }

        //view
        return view('Homework.confirmHomework', [
            'item' => $item,
            'param' => $param,
            'gender' => $gender,
            'is_send_email' => $is_send_email,
        ]);


    }

    public function thankyou(Request $request){
        $result = [
            //'id' => ,
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'age_id' => $request->input('age_id'),
            'email' => $request->input('mail'),
            'send_email' => $request->input('send_email'),
            'feedback' => $request->input('feedback'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now(),
        ];
        DB::table('answers')->insert($result);

        return view('Homework.thankyou', ['result' => $result]);
    }

}
