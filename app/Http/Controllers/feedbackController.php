<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class feedbackController extends Controller
{
    public function feedback(Request $request){
        $theaters = DB::table('theaters')->get();
        $name = $request->input('name');

        $params = [
            'theaters' => $theaters,
            'name' => $name,
            'stars' => self::stars(),
        ];
        return view('IMAX.feedbackimax', $params);
    }

    public function confirm(Request $request){
        $validate_rules = [
            'name' => 'required | string | max:200',
            'theaterId' => 'required | integer',
            'evaluation' => 'required | integer',
            'feedback' => 'max:1000'
        ];
        $messages = [
            'required' => 'この項目は必須です',
            'feedback.max:1000' => '1000字以内でお願いします',
        ];
        $request->validate($validate_rules, $messages);

        $name = $request->input('name');
        $theaterId = $request->input('theaterId');
        $theater = DB::table('theaters')->where('id', $theaterId)->first();
        $theaterName = $theater->theaterName;
        $evaluation = $request->input('evaluation');
        $feedback = $request->input('feedback');

        $items = [
            'ニックネーム' => $name,
            '映画館' => $theaterName,
            '評価' => $evaluation,
            'フィードバック' => $feedback,
        ];

        $send = [
            'name' => $name,
            'theaterId' => $theaterId,
            'evaluation' => $evaluation,
            'feedback' => $feedback,
        ];

        $params = [
            'items' => $items,
            'send' => $send
        ];
        return view('IMAX.confirmimax', $params);
    }

    public function thankyou(Request $request){
        $result = [
            'name' => $request->input('name'),
            'theaterId' => $request->input('theaterId'),
            'evaluation' => $request->input('evaluation'),
            'feedback' => $request->input('name'),
            'created_at' => Carbon::now(),
        ];
        DB::table('feedbacks')->insert($result);
        return view('IMAX.thankyouimax');
    }

    public static function stars(){
        return [
            5 => '５',
            4 => '４',
            3 => '３',
            2 => '２',
            1 => '１'
        ];
    }
}
